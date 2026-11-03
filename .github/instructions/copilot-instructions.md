# GitHub Copilot instructions for this project

## Project context

This repository is a legacy PHP application (source: PHP 5.3.10, procedural with some OOP) that is being migrated to **PHP 8.4.27**, one folder at a time.

- The full procedure is in `php84-migrate-folder.prompt.md`. Follow it for any migration task.
- The migration tool is `tools/php53-to-84-refactor.php`.
- Migrate only the folder named in the task. Leave every other folder untouched, because it may still run on the old 5.3.10 server until its own pass.
- Inside the target folder, write code that is valid on PHP 8.4.27. Do not keep PHP 5.3 compatibility there.
- Outside the target folder, never introduce syntax or behaviour that would break PHP 5.3.10. If a fix needs a change elsewhere, list it under "Cross-folder dependencies" in the report and do not make it.

## Tool rules

- Run the tool only with PHP 8.4.27 on a dev machine or container, never on the 5.3.10 server.
- Do not edit `tools/php53-to-84-refactor.php`.
- Quote the target folder in every shell command.
- Commands:
  - Full pass (PHP 8.4 fixes + SQL backticks): `php tools/php53-to-84-refactor.php run "<folder>"`
  - SQL backticks only: `php tools/php53-to-84-refactor.php backticks "<folder>"`
- The tool is a dry run unless `--write` is passed. Pass `--write` only after the user confirms the dry run.
- Default scope is SQL inside class bodies. Use `--scope=all`, `--columns-only`, `--no-fragments`, or `--allow-mixed-case` only when the task asks for them, and review the diff afterwards.
- Do not use `--no-backup` or `--no-lint`.
- Do not commit generated files: `backtick-tasks.md`, `refactor-tasks.md`, `report.json`, `.refactor-backup/`. Add them to `.gitignore` if missing.
- The tool exits with status 1 while errors remain. That is expected during a pass and is not a tool failure.

## Required workflow for a migration pass

1. Check the environment and working tree before changing anything:
   - `php -v`
   - `git status --porcelain`
2. If PHP is below 8.0, stop and report it. If it is not 8.4.27, report the version and the tool's CVE warning, then ask whether to continue.
3. If the repo has uncommitted changes, stop and ask the user before continuing.
4. Create a branch: `php84/<folder-name>` for a full pass, or `sql-backticks/<folder-name>` for a backtick-only pass.
5. Dry run first:
   - Full: `php tools/php53-to-84-refactor.php run "<folder>" --tasks=refactor-tasks.md --report=report.json`
   - Backticks only: `php tools/php53-to-84-refactor.php backticks "<folder>" --tasks=backtick-tasks.md`
6. Review the output for false positives, strings that are not SQL, and the "SQL manual review" and "REMAINING ISSUES" lists.
7. After confirmation, apply with `--write`.
8. Work through the task file (`refactor-tasks.md` or `backtick-tasks.md`). Do not mark an item done until step 9 passes.
   - Backtick items: add quoting only, change nothing else in the query.
   - Full pass items: follow Phase 3 of `php84-migrate-folder.prompt.md`.
9. Verify:
   - `find "<folder>" -name '*.php' -print0 | xargs -0 -n1 php -l | grep -v '^No syntax errors'`
   - `vendor/bin/phpcs -p --standard=PHPCompatibility --runtime-set testVersion 8.4- "<folder>"`
   - A final dry run must show `SQL queries to update: 0`, and for a full pass no remaining `error` findings.
   - Review `git diff` to confirm only the intended changes were made.
10. Commit only the target folder's files:
    - Full pass: `php84(<folder-name>): migrate to PHP 8.4 (PDO, remove removed features)`
    - Backticks only: `sql-backticks(<folder-name>): quote SQL identifiers`
11. Give the Phase 5 report: files changed, queries converted, behaviour changes, cross-folder dependencies, open items.

## SQL rules

- Use the repository tool for bulk identifier quoting. Do not hand-edit SQL in bulk.
- Quote table, column, and alias names with backticks inside SQL string literals only. Qualified names are quoted per part: `` `t`.`col` ``.
- Never put a backtick outside a string, because PHP treats it as shell execution.
- Do not quote `*`, SQL keywords, functions, literals, bound parameters (`:id`, `?`), or interpolations such as `{$var}`.
- A variable used as an identifier must be checked against a fixed allowlist before it is wrapped in backticks.
- Never put a variable inside an SQL string. Convert `mysql_*` calls to PDO prepared statements with bound parameters, as described in the prompt file.
- Do not echo SQL or exception messages to the browser. Use `error_log()`.

## Safety rules

- Do not broaden the change beyond the target folder.
- Do not add unrelated formatting or cleanup to the same patch.
- Keep behaviour, request parameter names, session keys, and JSON/HTML output unchanged unless the prompt file requires otherwise.
- Never hard-code credentials. Read them from the configured source.
- AJAX endpoints must keep their existing JSON keys and return exactly one valid JSON document.
- Never guess. If something cannot be determined from the repo, list it under "Open items".
- Treat false positives carefully: quote only real SQL identifiers, and leave values, variables, and text that merely looks like SQL unchanged.

## Repository notes

- This project mixes legacy PHP files and custom helper utilities.
- Prefer minimal, targeted edits over large refactors.
- When in doubt, preserve behaviour over modernising the code.