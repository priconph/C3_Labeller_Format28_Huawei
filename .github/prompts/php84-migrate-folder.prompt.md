# Refactor Guide: PHP 5.3.10 → PHP 8.4.27 (one folder at a time)

Source: PHP 5.3.10 (typically `5.3.10-1ubuntu3.x` on Ubuntu 12.04), procedural code with some OOP.
Target: PHP 8.4.27 (fixes CVE-2026-109618 / CVE-2026-109619).
Tool: `tools/php53-to-84-refactor.php`
Method: migrate **one folder per pass**. Finish, verify, and commit a folder before starting the next.

## Rules for every folder

- Change only files inside the current folder `<TARGET_FOLDER>`. If a fix requires a change elsewhere, list it under "Cross-folder dependencies" and do not make it.
- Keep behaviour, request parameter names, session keys, and JSON/HTML output unchanged unless a rule below requires otherwise.
- Never hard-code credentials. Read them from `<CONFIG_SOURCE>`.
- Never guess. If something cannot be determined from the repo, add it to "Open items" in the report.
- Work on a git branch `php84/<folder-name>`. One commit per folder.

## Phase 0: One-time setup (first folder only)

1. Use a dev machine or container with **PHP 8.4.27**. Do not run the tooling on the 5.3.10 server (it cannot run PHP 8 tools).
2. Install tools:
   ```bash
   composer require --dev rector/rector squizlabs/php_codesniffer phpcompatibility/php-compatibility
   php tools/php53-to-84-refactor.php init     # creates rector.php
   ```
3. Record the baseline: `<TEST_COMMAND>` results on the old code, if tests exist. If none exist, write a short manual smoke-test list for each page/endpoint in the folder.
4. Capture the old server's effective settings (run `php -i` or a `phpinfo()` page on the 5.3.10 server, then delete the page). Note at least: `magic_quotes_gpc`, `register_globals`, `short_open_tag`, `safe_mode`, `date.timezone`, `default_charset`, `error_reporting`, `session.save_path`, `memory_limit`, `upload_max_filesize`, and `max_input_vars` (5.3.10 introduced the default limit of 1000).
5. Build the **folder order**: list top-level folders and sort by (a) shared/include/config code first, (b) database-heavy modules, (c) pages, (d) AJAX endpoints. Shared code first prevents repeated rework.

## Phase 1: Inventory the folder

Run (dry-run, changes nothing):

```bash
php tools/php53-to-84-refactor.php run <TARGET_FOLDER> --tasks=refactor-tasks.md --report=report.json
```

Then search the folder for items the tool cannot see, and add them to the task list:

- Runtime ini checks: `ini_get`/`ini_set` of `register_globals`, `magic_quotes_*`, `safe_mode`, `allow_call_time_pass_reference`, `track_errors`, `asp_tags` (removed in PHP 8; the tool reports these)
- Config files the tool does not scan: search `.htaccess`, `php.ini`, `.user.ini` for `php_value`/`php_flag` lines that set the same removed directives, and for `short_open_tag`
- `register_globals` style: variables used without being defined (`$id`, `$action` read straight from the URL), `extract($_REQUEST)`, `import_request_variables`
- `include`/`require` with relative paths, `include_path` dependence, `short_open_tag` (`<?` without `php`)
- `$_SESSION` setup, `session_register`, `session_start()` placement, `header()` calls after output
- Date/time without `date_default_timezone_set` (5.3 only warned; 8.x still needs a valid timezone)
- `htmlspecialchars`/`htmlentities` calls without a charset, and file encodings other than UTF-8 (the 5.3 default charset was ISO-8859-1; PHP 8 defaults to UTF-8)
- Dynamic properties on classes (properties assigned but never declared; deprecated in 8.2)
- `count()`, `strlen()`, `trim()` etc. on values that can be `null` or non-arrays
- Calls to non-static methods using `Class::method()`
- 5.3-era idioms: `array()` syntax is still valid, but `list()` with references, `mysql_connect` persistent connections (`mysql_pconnect`), `session.auto_start`, `$GLOBALS` writes, and `global` variable reliance across includes
- Passwords stored with `md5()`/`sha1()`/`crypt()`: keep verifying old hashes, then rehash on login with `password_hash()` (list under Open items; do not change the stored format silently)
- Uses of `mail()`, `exec()`, `eval()`, `include $_GET[...]`, file uploads, `unserialize()` on user input

## Phase 2: Automatic fixes

```bash
php tools/php53-to-84-refactor.php run <TARGET_FOLDER> --write
vendor/bin/rector process <TARGET_FOLDER> --dry-run     # review the diff
vendor/bin/rector process <TARGET_FOLDER>
```

The tool fixes: PHP 4-style constructors, `$str{0}`, `Type $x = null` → `?Type $x = null`, `"${var}"`, `get_magic_quotes_gpc()`, `is_real()`, `=& new`, and call-time `foo(&$x)`. It also adds SQL backticks inside classes (see 3.1a); use `--no-backticks` to skip that step.

After it runs, check each call-time reference fix: the called function must declare `&$x`. If it does not, the old code was passing by reference to a by-value parameter; decide whether the function should now take `&$x`.

## Phase 3: Manual fixes (Copilot works through `refactor-tasks.md`)

Handle each item. Do not mark a task done until the folder passes Phase 4.

### 3.1 Database: `mysql_*` → PDO

All `mysql_*` calls must become PDO prepared statements.

```php
function getPdo(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        // $dsn, $user, $pass come from <CONFIG_SOURCE>; the charset must match the database
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}
```

| Legacy | PDO |
|---|---|
| `mysql_connect` + `mysql_select_db` | `new PDO($dsn, ...)` (database in the DSN) |
| `mysql_query` + `mysql_fetch_assoc` loop | `prepare()` + `execute($params)` + `fetchAll()` |
| `mysql_fetch_array` / `mysql_fetch_row` | `FETCH_BOTH` / `FETCH_NUM`; check how the code indexes the result |
| `mysql_result($res, $row, $col)` | `fetchColumn()` or index the fetched row |
| `mysql_num_rows` | `count($rows)` or `SELECT COUNT(*)` |
| `mysql_affected_rows` | `$stmt->rowCount()` |
| `mysql_insert_id` | `$pdo->lastInsertId()` |
| `mysql_real_escape_string` / `addslashes` | Remove; bind the value |
| `mysql_error` | Catch `PDOException`, log it, show a generic message |

Bad:

```php
$id  = $_GET['id'];
$res = mysql_query("SELECT * FROM item WHERE id = '$id'");
```

Good:

```php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null) { /* reject the request */ }
$stmt = getPdo()->prepare('SELECT * FROM `item` WHERE `id` = :id');
$stmt->execute([':id' => $id]);
```

Rules:
- Never put a variable inside an SQL string. Always bind.
- Table/column names from input must be checked against a fixed allowlist.
- Bind `LIMIT`/`OFFSET` as `PDO::PARAM_INT`.
- For `IN (...)`, generate one `?` per value; return early if the list is empty.
- Writes that must succeed together go in `beginTransaction()` / `commit()`, with `rollBack()` in the `catch`.
- Remove all `stripslashes()` and magic-quotes handling. If the old server had `magic_quotes_gpc` on (the 5.3.10 default in `php.ini-development`/`php.ini-production` was already deprecated but commonly left on), input was escaped automatically; 8.4 input never is. Check the old `php.ini`/`.htaccess` (Phase 0 step 4) to know which behaviour the code relied on. Stored data may already contain doubled backslashes; list that under Open items rather than "fixing" it silently.
- Do not echo exception messages or SQL to the browser. Use `error_log()`.
- Old tables may be MyISAM with `latin1`. Confirm the connection charset (Open items) before choosing `charset=` in the DSN, otherwise accented text will be corrupted.

### 3.1a SQL identifiers in OOP code: backticks on every column and table name

Every SQL string inside a class must quote identifiers with backticks. This applies whether the query goes through `mysqli`, PDO, or a wrapper such as `$this->run()`, `$this->query()`, or `$this->prepare()`.

Phase 2 already applies this automatically to class bodies. Use the procedure below to handle what the tool left in its "manual review" list.

Procedure for each file in the folder:

1. Find every class: `grep -rnE '^\s*(abstract |final )?class\s+\w+' <TARGET_FOLDER>`
2. In each class, find every SQL string (`SELECT`, `INSERT`, `UPDATE`, `DELETE`, `REPLACE`, `JOIN`, `ORDER BY`, `GROUP BY`) and add backticks.
3. Record each class and method changed in the report.

```php
// Bad
return $this->run("SELECT pkid, system FROM tbl_system WHERE logdel = 0");

// Good
return $this->run("SELECT `pkid`, `system` FROM `tbl_system` WHERE `logdel` = 0");
```

Rules:
- Backtick every column name and every table name: in `SELECT`, `FROM`, `JOIN ... ON`, `WHERE`, `SET`, `INSERT INTO t (cols)`, `ORDER BY`, `GROUP BY`, and `HAVING`.
- Qualified names are quoted per part: `` `t`.`col` ``, never `` `t.col` ``.
- Do not backtick `*`, SQL keywords, functions (`COUNT`, `NOW`, `IFNULL`), literals, or bound parameters (`:id`, `?`).
- Aliases are backticked: `` `col` AS `alias` ``.
- Backticks inside a PHP double-quoted or single-quoted string are literal and safe. Never put a backtick outside a string, because PHP treats it as shell execution.
- Do not change the query logic, column order, or values. Only add quoting.
- If an identifier comes from a variable, check it against a fixed allowlist first, then wrap it: `` "`{$col}`" ``. Never backtick unvalidated input.
- Strings that are built across several lines or concatenated need backticks in every fragment.
- Do not touch the `${...}` or `{$var}` interpolations inside the string.
- Reserved words used as column names (`system`, `order`, `group`, `key`, `status`...) are the main reason for this rule; the new MySQL/MariaDB versions reserve more words than the 5.x server did.

### 3.2 `register_globals`-style input

Replace every implicit global with an explicit, validated read:

```php
// Bad
extract($_REQUEST);
echo $action;

// Good
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?? '';
```

Rules:
- One explicit variable per input. Validate type and range (`FILTER_VALIDATE_INT`, allowlist for enums).
- Initialise every variable before use. Use `??` or `isset()` for optional input.

### 3.3 Other removed or changed features

| Found | Replace with |
|---|---|
| `preg_replace('/.../e', ...)` | `preg_replace_callback()` with a closure |
| `ereg*`, `split`, `spliti` | `preg_*` or `explode()` |
| `each()` | `foreach` / `key()` / `current()` |
| `create_function()` | closure |
| `__autoload()` | `spl_autoload_register()` |
| `session_register()` etc. | `$_SESSION['key'] = ...` |
| `$HTTP_*_VARS`, `$HTTP_RAW_POST_DATA` | `$_GET`/`$_POST`..., `file_get_contents('php://input')` |
| `break $n;` / `continue $n;` | literal number |
| `utf8_encode`/`utf8_decode` | `mb_convert_encoding()` |
| `strftime()` | `date()` or `IntlDateFormatter` |
| `mcrypt_*` | `openssl_*` or `sodium_*` |
| `mssql_*`, `sybase_*` | PDO with the matching driver |
| `<?` short tags | `<?php` / `<?=` |
| `ini_set('register_globals' / 'magic_quotes_*' / 'safe_mode', ...)` and matching `ini_get` checks | Delete the call and replace the logic it guarded: explicit input handling (3.2), bound SQL parameters (3.1) |
| `E_STRICT`, `trigger_error(E_USER_ERROR)` | remove / throw an exception |
| `imap_*`, `oci_*` | PECL extension or replacement (flag as dependency) |
| `unserialize($userInput)` | `json_decode()`, or `unserialize($s, ['allowed_classes' => false])` |
| `crypt($s)` without salt | `password_hash()` / `password_verify()` |

### 3.4 PHP 8 behaviour changes

- Declare class properties. Do not rely on creating them dynamically.
- Calling non-static methods statically is fatal. Make the method `static` or instantiate the class.
- Optional parameters before required ones: reorder or give the later parameter a default.
- `null` passed to non-nullable built-in arguments: cast or default first (for example `trim((string) $v)`).
- Undefined variables, array keys and offsets now raise warnings; undefined constants (`FOO` without quotes) are fatal errors. Quote array keys written as barewords (`$row[id]` → `$row['id']`).
- Add `date_default_timezone_set('<TIMEZONE>')` if no shared bootstrap sets it.
- Pass an explicit charset to `htmlspecialchars($s, ENT_QUOTES, 'UTF-8')`. Note that from 8.1 the default flags are `ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401`, so single quotes are now escaped.
- String-to-number comparisons changed in PHP 8 (`0 == "abc"` is now `false`). Use `===` where input can be a non-numeric string.
- Arithmetic or `+` on non-numeric strings throws `TypeError`/warns; `"abc" * 1` is no longer silently `0`.
- `array_key_exists()` on objects is removed; use `property_exists()` or `isset()`.
- `static` closures, `$this` inside static closures, and `list()` with string offsets: review where found.
- Convert files that are not UTF-8 to UTF-8 only after confirming with the owner (see Open items).

### 3.5 AJAX endpoints (JSON for jQuery)

Every endpoint returns exactly one valid JSON document.

```php
<?php
ob_start();                          // first statement, before any include
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

function respond(array $payload, int $status = 200): never
{
    while (ob_get_level() > 0) {
        ob_end_clean();              // discard stray output, warnings, BOM
    }
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}
```

Rules:
- Keep the **existing JSON keys** the jQuery code reads. Find them by searching JS/HTML for the endpoint name before editing.
- Remove closing `?>` and any whitespace or BOM before `<?php`.
- No `echo`, `print`, `var_dump`, or `print_r` outside `respond()`.
- Wrap logic in `try/catch (Throwable)`: log the error, respond with a generic message and status `500`.
- Use `422` for validation errors, `200` for success.
- Old code that built JSON by string concatenation or used `json_encode` on `latin1` data must now produce valid UTF-8 (convert the data, do not just suppress the error).

## Phase 4: Verify the folder

```bash
find <TARGET_FOLDER> -name '*.php' -print0 | xargs -0 -n1 php -l | grep -v '^No syntax errors'
vendor/bin/phpcs -p --standard=PHPCompatibility --runtime-set testVersion 8.4- <TARGET_FOLDER>
grep -rnE 'mysql_|ereg|split\(|each\(|create_function|session_register|get_magic_quotes|\$HTTP_[A-Z_]+_VARS' <TARGET_FOLDER>
php tools/php53-to-84-refactor.php run <TARGET_FOLDER>
<TEST_COMMAND>
```

The folder is done only when all of these are true:

- [ ] `php -l` reports no errors on PHP 8.4.27
- [ ] PHPCompatibility reports no errors
- [ ] `grep` and the tool report no remaining legacy calls
- [ ] Every SQL statement uses `prepare()` and bound parameters
- [ ] Every SQL string inside a class has backticks on table and column names
- [ ] Each page and endpoint in the folder was opened or called and behaves like the old version (same output, same session behaviour)
- [ ] Forcing a warning in an AJAX endpoint (temporarily add `echo $undefined;`) still returns valid JSON; remove it afterwards
- [ ] PHP error log shows no new warnings, notices, or deprecations during the smoke test
- [ ] No credentials, SQL text, or file paths appear in any response

## Phase 5: Report and move on

Produce this report for the folder, then commit and start the next folder:

1. Files changed (count) and automatic fixes applied.
2. Each converted query: old call → new statement.
3. Behaviour that changed or could not be preserved, with the reason.
4. Cross-folder dependencies that still need work.
5. Open items needing a decision.

Commit message format: `php84(<folder>): migrate to PHP 8.4 (PDO, remove removed features)`

## Order of work and rollout

1. Shared/include/config folders → database modules → pages → AJAX endpoints.
2. Deploy to a **staging server on PHP 8.4.27** after each group, not only at the end.
3. Keep the 5.3.10 server (Ubuntu 12.04, long out of support) isolated behind the firewall and restricted to known IP ranges until the last folder is migrated. It cannot receive the CVE fix.
4. After cut-over, check the web directories for unexpected PHP files and unusual outbound connections, because exploitation began before the patch was public.

## Open items (fill in before starting)

- `<TARGET_FOLDER>`: the folder for this pass
- `<CONFIG_SOURCE>`: where DB credentials currently come from
- `<TEST_COMMAND>`: automated test command, or "none" (then use manual smoke tests)
- `<TIMEZONE>`: server timezone (for example `Asia/Manila`)
- Database charset (`utf8mb4`, `utf8`, or `latin1`) and file encoding of the source
- Whether `magic_quotes_gpc` was on at the old server, and whether stored data contains escaped backslashes
- Password hash format currently stored (`md5`, `sha1`, `crypt`, other)
- Path of `tools/php53-to-84-refactor.php` in the repo