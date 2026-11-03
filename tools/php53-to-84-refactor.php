#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * php53-to-84-refactor.php   (PHP 5.3.10 -> 8.4.27 migration helper + SQL backtick tool)
 *
 * Source : PHP 5.3.10 (e.g. 5.3.10-1ubuntu3.x on Ubuntu 12.04), procedural + some OOP code.
 * Target : PHP 8.4.27
 *
 * PART A: Token-based migration helper: legacy PHP 5.3.x code -> PHP 8.4 compatible.
 *   - AUTO-FIXES the mechanical, safe changes (tokenizer-based, never touches strings/comments).
 *   - REPORTS everything that needs a human/Copilot decision (mysql_*, ereg, each, create_function ...).
 *
 * PART B: SQL backticks. Finds every class and adds backticks around table / column / alias
 *   names inside the SQL strings it contains:
 *       "SELECT pkid, system FROM tbl_system WHERE logdel = 0"
 *   ->  "SELECT `pkid`, `system` FROM `tbl_system` WHERE `logdel` = 0"
 *   - Only PHP string literals are touched, never code or comments.
 *   - Understands "..." . $x . "..." concatenation and "{$var}" interpolation (kept as-is).
 *   - Only ADDS backticks. A built-in check refuses any edit that changes anything else.
 *   - Idempotent: already-quoted names are left alone, so re-running is safe.
 *
 * Commands:
 *   run        Part A + Part B together (Part B can be skipped with --no-backticks)
 *   backticks  Part B only
 *   init       Generate rector.php + show toolchain
 *
 * DRY-RUN by default. Use --write to apply (backups are created automatically).
 * Run it with PHP 8.4.27:   php php53-to-84-refactor.php --help
 * NEVER run it on the old 5.3.10 server (it needs PHP 8). Copy the code to a dev machine/container.
 */

if (PHP_VERSION_ID < 80000) {
    fwrite(STDERR, "Run this tool with PHP 8.0+ (8.4.27 recommended). The old 5.3.10 server cannot run it.\n");
    exit(2);
}
if (!extension_loaded('tokenizer')) {
    fwrite(STDERR, "The tokenizer extension is required.\n");
    exit(2);
}

/* CVE-2026-109618 / CVE-2026-109619 (PHP2Shell): fixed in 8.2.35, 8.3.36, 8.4.27, 8.5.12 */
(function (): void {
    $fixed = ['8.2' => '8.2.35', '8.3' => '8.3.36', '8.4' => '8.4.27', '8.5' => '8.5.12'];
    $branch = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
    if (!isset($fixed[$branch]) || version_compare(PHP_VERSION, $fixed[$branch], '<')) {
        fwrite(STDERR, "WARNING: PHP " . PHP_VERSION . " is vulnerable to CVE-2026-109618/109619. "
            . "Target 8.4.27 (or 8.2.35 / 8.3.36 / 8.5.12) for servers and for running this tool.\n\n");
    }
})();

/* ================================================================== */
/* SHARED: token helpers                                               */
/* ================================================================== */

/** @return array<int, array{0:int|string,1:string,2:int}> */
function lex(string $code): array
{
    $out = [];
    $line = 1;
    foreach (token_get_all($code) as $t) {
        if (is_array($t)) {
            $out[] = [$t[0], $t[1], $t[2]];
            $line = $t[2] + substr_count($t[1], "\n");
        } else {
            $out[] = [$t, $t, $line];
        }
    }
    return $out;
}

function unlex(array $toks): string
{
    return implode('', array_column($toks, 1));
}

function isTrivia(array $t): bool
{
    return in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true);
}

function nextSig(array $t, int $i): int
{
    for ($n = count($t); ++$i < $n;) {
        if (!isTrivia($t[$i])) {
            return $i;
        }
    }
    return -1;
}

function prevSig(array $t, int $i): int
{
    while (--$i >= 0) {
        if (!isTrivia($t[$i])) {
            return $i;
        }
    }
    return -1;
}

function isOpenBrace(int|string $x): bool
{
    return $x === '{' || $x === T_CURLY_OPEN || $x === T_DOLLAR_OPEN_CURLY_BRACES;
}

function findParamsOpen(array $t, int $i): int
{
    for ($j = $i + 1, $n = count($t); $j < $n; $j++) {
        $x = $t[$j][0];
        if ($x === '(') {
            return $j;
        }
        if ($x === ';' || $x === '{') {
            return -1;
        }
    }
    return -1;
}

/** Parse a parameter list starting at the "(" token index. */
function parseParams(array $t, int $open): array
{
    $n = count($t);
    $depth = 0;
    $segs = [];
    $start = $open + 1;
    for ($j = $open; $j < $n; $j++) {
        $x = $t[$j][0];
        if ($x === '(' || $x === '[') {
            $depth++;
        } elseif ($x === ')' || $x === ']') {
            $depth--;
            if ($depth === 0) {
                $segs[] = [$start, $j];
                break;
            }
        } elseif ($x === ',' && $depth === 1) {
            $segs[] = [$start, $j];
            $start = $j + 1;
        }
    }

    $params = [];
    foreach ($segs as [$s, $e]) {
        $sig = [];
        for ($k = $s; $k < $e; $k++) {
            if (!isTrivia($t[$k])) {
                $sig[] = $k;
            }
        }
        $v = null;
        foreach ($sig as $k) {
            if ($t[$k][0] === T_VARIABLE) {
                $v = $k;
                break;
            }
        }
        if ($v === null) {
            continue;
        }
        $typeIdx = [];
        $variadic = false;
        foreach ($sig as $k) {
            if ($k >= $v) {
                break;
            }
            if ($t[$k][1] === '...') {
                $variadic = true;
            } elseif ($t[$k][1] !== '&') {
                $typeIdx[] = $k;
            }
        }
        $after = array_values(array_filter($sig, fn($k) => $k > $v));
        $hasDefault = isset($after[0]) && $t[$after[0]][1] === '=';
        $defaultNull = $hasDefault && count($after) === 2 && strtolower($t[$after[1]][1]) === 'null';
        $params[] = compact('v', 'typeIdx', 'variadic', 'hasDefault', 'defaultNull');
    }
    return $params;
}

/* ================================================================== */
/* PART A: AUTO-FIXERS (each returns number of changes)                */
/* ================================================================== */

/** PHP4-style constructors (removed in PHP 8.0) -> __construct. Skipped in namespaced files (never were ctors). */
function fixConstructors(array &$t): int
{
    foreach ($t as $x) {
        if ($x[0] === T_NAMESPACE) {
            return 0;
        }
    }
    $n = count($t);
    $count = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($t[$i][0] !== T_CLASS) {
            continue;
        }
        $p = prevSig($t, $i);
        if ($p >= 0 && $t[$p][0] === T_DOUBLE_COLON) {
            continue; // Foo::class
        }
        $nm = nextSig($t, $i);
        if ($nm < 0 || $t[$nm][0] !== T_STRING) {
            continue;
        }
        $class = strtolower($t[$nm][1]);
        $j = $nm;
        while ($j < $n && $t[$j][0] !== '{') {
            $j++;
        }
        $depth = 0;
        $methods = [];
        for (; $j < $n; $j++) {
            $x = $t[$j][0];
            if (isOpenBrace($x)) {
                $depth++;
            } elseif ($x === '}') {
                $depth--;
                if ($depth === 0) {
                    break;
                }
            } elseif ($x === T_FUNCTION && $depth === 1) {
                $m = nextSig($t, $j);
                if ($m >= 0 && $t[$m][1] === '&') {
                    $m = nextSig($t, $m);
                }
                if ($m >= 0 && $t[$m][0] === T_STRING) {
                    $methods[strtolower($t[$m][1])] = $m;
                }
            }
        }
        if (!isset($methods['__construct']) && isset($methods[$class])) {
            $t[$methods[$class]][1] = '__construct';
            $count++;
        }
    }
    return $count;
}

/** $str{0} -> $str[0]   (curly offset syntax removed in PHP 8.0) */
function fixCurlyOffset(array &$t): int
{
    $count = 0;
    for ($i = 1, $n = count($t); $i < $n; $i++) {
        if ($t[$i][0] !== '{') {
            continue;
        }
        $prev = $t[$i - 1];
        $isOffset = $prev[0] === T_VARIABLE
            || $prev[1] === ']'
            || ($prev[0] === T_STRING && $i > 1 && $t[$i - 2][0] === T_OBJECT_OPERATOR);
        if (!$isOffset) {
            continue;
        }
        $depth = 1;
        for ($j = $i + 1; $j < $n; $j++) {
            if (isOpenBrace($t[$j][0])) {
                $depth++;
            } elseif ($t[$j][0] === '}') {
                $depth--;
                if ($depth === 0) {
                    $t[$i][0] = $t[$i][1] = '[';
                    $t[$j][0] = $t[$j][1] = ']';
                    $count++;
                    break;
                }
            }
        }
    }
    return $count;
}

/** Foo $x = null  ->  ?Foo $x = null   (implicit nullable deprecated in PHP 8.4) */
function fixImplicitNullable(array &$t): int
{
    $ins = [];
    $fn = defined('T_FN') ? T_FN : -1;
    for ($i = 0, $n = count($t); $i < $n; $i++) {
        if ($t[$i][0] !== T_FUNCTION && $t[$i][0] !== $fn) {
            continue;
        }
        $open = findParamsOpen($t, $i);
        if ($open < 0) {
            continue;
        }
        foreach (parseParams($t, $open) as $p) {
            if ($p['typeIdx'] && $p['defaultNull']) {
                $first = $p['typeIdx'][0];
                $txt = strtolower($t[$first][1]);
                if (!in_array($txt, ['?', 'mixed', 'null'], true)) {
                    $ins[$first] = true;
                }
            }
        }
    }
    krsort($ins);
    foreach (array_keys($ins) as $idx) {
        array_splice($t, $idx, 0, [['?', '?', $t[$idx][2]]]);
    }
    return count($ins);
}

/** "${var}" -> "{$var}"   (deprecated in PHP 8.2) */
function fixVarInterpolation(array &$t): int
{
    $count = 0;
    for ($i = 0, $n = count($t) - 1; $i < $n; $i++) {
        if ($t[$i][0] === T_DOLLAR_OPEN_CURLY_BRACES && $t[$i + 1][0] === T_STRING_VARNAME) {
            $t[$i][1] = '{$';
            $count++;
        }
    }
    return $count;
}

/** get_magic_quotes_gpc() -> false ; is_real() -> is_float() ; (real) -> (float) */
function fixSimpleCalls(array &$t): int
{
    $count = 0;
    for ($i = 0, $n = count($t); $i < $n; $i++) {
        if ($t[$i][0] !== T_STRING) {
            continue;
        }
        $p = prevSig($t, $i);
        if ($p >= 0 && in_array($t[$p][0], [T_OBJECT_OPERATOR, T_DOUBLE_COLON, T_FUNCTION, T_NEW], true)) {
            continue;
        }
        $lc = strtolower($t[$i][1]);
        $a = nextSig($t, $i);
        if ($a < 0) {
            continue;
        }
        if (in_array($lc, ['get_magic_quotes_gpc', 'get_magic_quotes_runtime'], true) && $t[$a][0] === '(') {
            $b = nextSig($t, $a);
            if ($b >= 0 && $t[$b][0] === ')') {
                $t[$i][1] = 'false';
                $t[$a][1] = '';
                $t[$b][1] = '';
                $count++;
            }
        } elseif ($lc === 'is_real' && $t[$a][0] === '(') {
            $t[$i][1] = 'is_float';
            $count++;
        } elseif ($lc === 'real' && $p >= 0 && $t[$p][0] === '(' && $t[$a][0] === ')') {
            $pp = prevSig($t, $p);
            $castContext = $pp < 0 || !in_array($t[$pp][0], [T_STRING, T_VARIABLE, ')', ']', T_FUNCTION, T_NEW], true);
            if ($castContext) {
                $t[$i][1] = 'float';
                $count++;
            }
        }
    }
    return $count;
}

/** $a =& new Foo  ->  $a = new Foo   (removed in PHP 7.0; deprecated already in 5.3) */
function fixNewByRef(array &$t): int
{
    $count = 0;
    for ($i = 0, $n = count($t); $i < $n; $i++) {
        if ($t[$i][0] !== '=') {
            continue;
        }
        $a = nextSig($t, $i);
        if ($a < 0 || $t[$a][1] !== '&') {
            continue;
        }
        $b = nextSig($t, $a);
        if ($b >= 0 && $t[$b][0] === T_NEW) {
            $t[$a][1] = '';
            $count++;
        }
    }
    return $count;
}

/** foo(&$x) -> foo($x)   (call-time pass-by-reference: fatal since PHP 5.4; callee must declare &$x) */
function fixCallTimeRef(array &$t): int
{
    $count = 0;
    $stack = [];
    for ($i = 0, $n = count($t); $i < $n; $i++) {
        $x = $t[$i][0];
        if ($x === '(') {
            $p = prevSig($t, $i);
            $kind = 'other';
            if ($p >= 0) {
                $pt = $t[$p][0];
                if ($pt === T_ARRAY) {
                    $kind = 'array';
                } elseif ($pt === T_FUNCTION || $pt === T_USE || $pt === T_LIST) {
                    $kind = 'decl';
                } elseif (in_array($pt, [T_STRING, T_VARIABLE, ')', ']', T_STATIC], true)) {
                    $kind = 'call';
                    if ($pt === T_STRING) {
                        $pp = prevSig($t, $p);
                        if ($pp >= 0 && $t[$pp][0] === T_FUNCTION) {
                            $kind = 'decl';
                        } elseif ($pp >= 0 && $t[$pp][1] === '&') {
                            $p3 = prevSig($t, $pp);
                            if ($p3 >= 0 && $t[$p3][0] === T_FUNCTION) {
                                $kind = 'decl';
                            }
                        }
                    }
                }
            }
            $stack[] = $kind;
        } elseif ($x === ')') {
            array_pop($stack);
        } elseif ($t[$i][1] === '&' && $stack && end($stack) === 'call') {
            $p = prevSig($t, $i);
            $nx = nextSig($t, $i);
            if ($p >= 0 && in_array($t[$p][1], ['(', ','], true) && $nx >= 0 && $t[$nx][0] === T_VARIABLE) {
                $t[$i][1] = '';
                $count++;
            }
        }
    }
    return $count;
}

function applyFixes(string $code): array
{
    $t = lex($code);
    $fixes = [
        'php4-constructor -> __construct' => fixConstructors($t),
        '$str{0} -> $str[0]' => fixCurlyOffset($t),
        'implicit nullable -> ?Type' => fixImplicitNullable($t),
        '"${var}" -> "{$var}"' => fixVarInterpolation($t),
        'magic_quotes/is_real/(real)' => fixSimpleCalls($t),
        '=& new -> = new' => fixNewByRef($t),
        'call-time &$x removed (verify callee declares &)' => fixCallTimeRef($t),
    ];
    return [unlex($t), array_filter($fixes)];
}

/* ================================================================== */
/* PART A: SCANNER (things that need manual work)                      */
/* ================================================================== */

const FUNC_RULES = [
    'create_function'   => ['error', 'removed in 8.0 -> use closures / arrow functions'],
    'session_register'  => ['error', 'removed in 5.4 -> $_SESSION[...] = ...'],
    'session_unregister'=> ['error', 'removed in 5.4 -> unset($_SESSION[...])'],
    'session_is_registered' => ['error', 'removed in 5.4 -> isset($_SESSION[...])'],
    'import_request_variables' => ['error', 'removed in 5.4 -> read $_GET/$_POST explicitly (register_globals style)'],
    'set_magic_quotes_runtime' => ['error', 'removed in 7.0 -> delete the call'],
    'define_syslog_variables'  => ['error', 'removed in 5.4 -> delete the call'],
    'set_socket_blocking'      => ['error', 'removed in 7.0 -> stream_set_blocking()'],
    'call_user_method'         => ['error', 'removed in 7.0 -> call_user_func(array($obj, "m"))'],
    'call_user_method_array'   => ['error', 'removed in 7.0 -> call_user_func_array()'],
    'mysql_db_query'    => ['error', 'removed with ext/mysql -> PDO'],
    'each'              => ['error', 'removed in 8.0 -> use foreach / key() / current()'],
    'split'             => ['error', 'removed in 7.0 -> preg_split() or explode()'],
    'spliti'            => ['error', 'removed in 7.0 -> preg_split() with /i'],
    'ereg'              => ['error', 'removed in 7.0 -> preg_match()'],
    'eregi'             => ['error', 'removed in 7.0 -> preg_match() with /i'],
    'ereg_replace'      => ['error', 'removed in 7.0 -> preg_replace()'],
    'eregi_replace'     => ['error', 'removed in 7.0 -> preg_replace() with /i'],
    'sql_regcase'       => ['error', 'removed in 7.0'],
    'money_format'      => ['error', 'removed in 8.0 -> NumberFormatter (intl)'],
    'fgetss'            => ['error', 'removed in 8.0 -> strip_tags(fgets())'],
    'gzgetss'           => ['error', 'removed in 8.0'],
    'read_exif_data'    => ['error', 'removed in 8.0 -> exif_read_data()'],
    'image2wbmp'        => ['error', 'removed in 8.0 -> imagewbmp()'],
    'convert_cyr_string'=> ['error', 'removed in 8.0 -> mb_convert_encoding()'],
    'hebrevc'           => ['error', 'removed in 8.0 -> nl2br(hebrev())'],
    'restore_include_path' => ['error', 'removed in 8.0 -> ini_restore()'],
    'ezmlm_hash'        => ['error', 'removed in 8.0'],
    'set_file_buffer'   => ['error', 'removed in 7.0 -> stream_set_write_buffer()'],
    'stripslashes'      => ['info', 'magic_quotes were ON by default on many 5.3.10 installs; in 8.4 input is never escaped -> remove if it only undid magic quotes (check old php.ini)'],
    'addslashes'        => ['warn', 'not a safe SQL escape -> bind parameters with PDO prepared statements'],
    'libxml_disable_entity_loader' => ['warn', 'deprecated in 8.0 (no-op; external entities off by default)'],
    'utf8_encode'       => ['warn', 'deprecated in 8.2 -> mb_convert_encoding($s, "UTF-8", "ISO-8859-1")'],
    'utf8_decode'       => ['warn', 'deprecated in 8.2 -> mb_convert_encoding($s, "ISO-8859-1", "UTF-8")'],
    'strftime'          => ['warn', 'deprecated in 8.1 -> date() / IntlDateFormatter'],
    'gmstrftime'        => ['warn', 'deprecated in 8.1 -> gmdate() / IntlDateFormatter'],
    'strptime'          => ['warn', 'deprecated in 8.1 -> date_parse_from_format()'],
    'date_sunrise'      => ['warn', 'deprecated in 8.1 -> date_sun_info()'],
    'date_sunset'       => ['warn', 'deprecated in 8.1 -> date_sun_info()'],
    'mysqli_ping'       => ['warn', 'deprecated in 8.4'],
    'mysqli_kill'       => ['warn', 'deprecated in 8.4'],
    'mysqli_refresh'    => ['warn', 'deprecated in 8.4'],
    'odbc_result_all'   => ['warn', 'deprecated in 8.1'],
    'mhash'             => ['warn', 'deprecated in 8.1 -> hash_*()'],
    'crypt'             => ['info', 'second argument (salt) is now required in PHP 8 -> prefer password_hash()'],
    'unserialize'       => ['warn', 'never unserialize user input -> json_decode() or pass [\'allowed_classes\' => false]'],
    'eval'              => ['warn', 'review: remote code execution risk'],
];

const PREFIX_RULES = [
    'mysql_'  => ['error', 'ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)'],
    'mcrypt_' => ['error', 'ext/mcrypt removed in 7.2 -> openssl_* or sodium_*'],
    'mssql_'  => ['error', 'ext/mssql removed in 7.0 -> PDO_SQLSRV / sqlsrv_*'],
    'sybase_' => ['error', 'ext/sybase_ct removed in 7.0 -> PDO'],
    'imap_'   => ['warn', 'ext/imap moved to PECL in 8.4 -> install via PECL or replace'],
    'oci_'    => ['warn', 'ext/oci8 moved to PECL in 8.4'],
    'pspell_' => ['warn', 'ext/pspell moved to PECL in 8.4'],
];

const REMOVED_INI = [
    'register_globals', 'register_long_arrays', 'register_argc_argv_x', 'magic_quotes_gpc', 'magic_quotes_runtime',
    'magic_quotes_sybase', 'safe_mode', 'safe_mode_gid', 'safe_mode_include_dir', 'safe_mode_exec_dir',
    'safe_mode_allowed_env_vars', 'safe_mode_protected_env_vars',
    'allow_call_time_pass_reference', 'define_syslog_variables', 'y2k_compliance', 'highlight.bg',
    'session.bug_compat_42', 'session.bug_compat_warn', 'track_errors', 'asp_tags', 'zend.ze1_compatibility_mode',
    'xsl.security_prefs', 'mbstring.script_encoding', 'mbstring.func_overload',
];

const CONST_RULES = [
    'E_STRICT'                 => ['warn', 'deprecated in 8.4 (no longer used by the engine)'],
    'E_USER_ERROR'             => ['info', 'trigger_error(E_USER_ERROR) deprecated in 8.4 -> throw an exception'],
    'FILTER_SANITIZE_STRING'   => ['warn', 'deprecated in 8.1 -> htmlspecialchars() / strip_tags()'],
    'FILTER_SANITIZE_STRIPPED' => ['warn', 'deprecated in 8.1 -> htmlspecialchars() / strip_tags()'],
    'FILTER_FLAG_SCHEME_REQUIRED' => ['error', 'removed in 8.0'],
    'FILTER_FLAG_HOST_REQUIRED'   => ['error', 'removed in 8.0'],
    'INTL_IDNA_VARIANT_2003'   => ['warn', 'deprecated in 7.2, removed in 8.0 -> INTL_IDNA_VARIANT_UTS46'],
];

function scanFindings(string $code, string $file): array
{
    $t = lex($code);
    $n = count($t);
    $out = [];
    $add = function (int $line, string $sev, string $rule, string $msg) use (&$out, $file): void {
        $out[] = ['file' => $file, 'line' => $line, 'sev' => $sev, 'rule' => $rule, 'msg' => $msg];
    };
    $fn = defined('T_FN') ? T_FN : -1;

    for ($i = 0; $i < $n; $i++) {
        [$type, $text, $line] = $t[$i];

        if ($type === T_EVAL) {
            $add($line, 'warn', 'eval', FUNC_RULES['eval'][1]);
            continue;
        }

        if ($type === T_STRING) {
            $p = prevSig($t, $i);
            $pt = $p >= 0 ? $t[$p][0] : null;
            if (in_array($pt, [T_OBJECT_OPERATOR, T_DOUBLE_COLON, T_NULLSAFE_OBJECT_OPERATOR], true)) {
                continue;
            }
            $nx = nextSig($t, $i);
            $isCall = $nx >= 0 && $t[$nx][0] === '(';
            $lc = strtolower($text);

            if ($pt === T_FUNCTION && $lc === '__autoload') {
                $add($line, 'error', '__autoload', '__autoload() removed in 8.0 -> spl_autoload_register()');
            } elseif ($isCall && !in_array($pt, [T_FUNCTION, T_NEW], true)) {
                $a1 = nextSig($t, $nx);
                if ($lc === 'preg_replace' && $a1 >= 0 && $t[$a1][0] === T_CONSTANT_ENCAPSED_STRING
                    && preg_match('/^([\'"])([^\w\s\\\\]).*\2([a-zA-Z]*)\1$/s', $t[$a1][1], $m) && str_contains($m[3], 'e')) {
                    $add($line, 'error', 'preg_replace /e', '/e modifier removed in 7.0 -> preg_replace_callback() with a closure');
                } elseif (in_array($lc, ['ini_set', 'ini_get', 'ini_restore'], true) && $a1 >= 0
                    && $t[$a1][0] === T_CONSTANT_ENCAPSED_STRING
                    && in_array(strtolower(trim($t[$a1][1], '\'"')), REMOVED_INI, true)) {
                    $add($line, 'warn', 'removed-ini', 'ini directive "' . trim($t[$a1][1], '\'"') . '" no longer exists in PHP 8 -> delete the call; its old behaviour is gone');
                } elseif ($lc === 'extract' && $a1 >= 0
                    && in_array($t[$a1][1], ['$_REQUEST', '$_GET', '$_POST', '$_COOKIE'], true)) {
                    $add($line, 'warn', 'register_globals-style', 'extract() of request data emulates register_globals -> read and validate each input explicitly');
                } elseif ($lc === 'unserialize') {
                    $add($line, 'warn', 'unserialize()', FUNC_RULES['unserialize'][1]);
                } elseif (isset(FUNC_RULES[$lc])) {
                    [$sev, $msg] = FUNC_RULES[$lc];
                    $add($line, $sev, $lc . '()', $msg);
                } else {
                    foreach (PREFIX_RULES as $prefix => [$sev, $msg]) {
                        if (str_starts_with($lc, $prefix)) {
                            $add($line, $sev, $prefix . '*', $msg);
                            break;
                        }
                    }
                    if (str_starts_with($lc, 'ereg')) {
                        $add($line, 'error', 'ereg*', 'POSIX regex functions removed in 7.0 -> preg_*');
                    }
                }
            } elseif (!$isCall && isset(CONST_RULES[$text]) && $pt !== T_CONST) {
                [$sev, $msg] = CONST_RULES[$text];
                $add($line, $sev, $text, $msg);
            }
        } elseif ($type === T_VARIABLE) {
            if ($text === '$php_errormsg') {
                $add($line, 'error', '$php_errormsg', 'removed in 8.0 -> error_get_last()');
            } elseif ($text === '$HTTP_RAW_POST_DATA') {
                $add($line, 'error', '$HTTP_RAW_POST_DATA', 'removed in 7.0 -> file_get_contents("php://input")');
            } elseif (preg_match('/^\$HTTP_(GET|POST|COOKIE|SERVER|ENV|POST_FILES|SESSION)_VARS$/', $text)) {
                $add($line, 'error', $text, 'long-form request arrays removed in 5.4 -> superglobals ($_GET, $_POST ...)');
            }
        } elseif ($type === T_BREAK || $type === T_CONTINUE) {
            $nx = nextSig($t, $i);
            if ($nx >= 0 && $t[$nx][0] === T_VARIABLE) {
                $add($line, 'error', 'break $var', 'variable break/continue argument removed in 5.4 -> use a literal number');
            }
        } elseif ($type === T_UNSET_CAST) {
            $add($line, 'error', '(unset)', '(unset) cast removed in 8.0 -> null');
        } elseif ($type === T_GOTO) {
            $add($line, 'info', 'goto', 'goto is legal but review for structured control flow');
        } elseif ($type === T_OPEN_TAG && !str_starts_with(strtolower($text), '<?php')) {
            $add($line, 'info', 'short-open-tag', 'short open tag "<?" -> use "<?php" (depends on short_open_tag ini)');
        } elseif ($type === T_FUNCTION || $type === $fn) {
            $open = findParamsOpen($t, $i);
            if ($open < 0) {
                continue;
            }
            $seenOptional = false;
            foreach (parseParams($t, $open) as $pr) {
                if ($pr['hasDefault']) {
                    $seenOptional = true;
                } elseif (!$pr['variadic'] && $seenOptional) {
                    $add($line, 'warn', 'param-order', 'required parameter after optional parameter (deprecated since 8.0) -> reorder or make required one nullable/defaulted');
                    break;
                }
            }
        }
    }
    return $out;
}

/* ================================================================== */
/* PART B: SQL BACKTICKS. Class + string helpers                       */
/* ================================================================== */

/** @return list<array{name:string,extends:?string,line:int,start:int,end:int}> */
function findClasses(array $t): array
{
    $out = [];
    $n = count($t);
    for ($i = 0; $i < $n; $i++) {
        if ($t[$i][0] !== T_CLASS && $t[$i][0] !== T_TRAIT) {
            continue;
        }
        $p = prevSig($t, $i);
        if ($p >= 0 && $t[$p][0] === T_DOUBLE_COLON) {
            continue; // Foo::class
        }
        $nm = nextSig($t, $i);
        $name = ($nm >= 0 && $t[$nm][0] === T_STRING) ? $t[$nm][1] : '(anonymous)';
        $ext = null;
        $j = $i;
        while ($j < $n && $t[$j][0] !== '{') {
            if ($t[$j][0] === T_EXTENDS) {
                $k = nextSig($t, $j);
                if ($k >= 0) {
                    $ext = $t[$k][1];
                }
            }
            $j++;
        }
        $depth = 0;
        $end = $n - 1;
        for (; $j < $n; $j++) {
            if (isOpenBrace($t[$j][0])) {
                $depth++;
            } elseif ($t[$j][0] === '}') {
                $depth--;
                if ($depth === 0) {
                    $end = $j;
                    break;
                }
            }
        }
        $out[] = ['name' => $name, 'extends' => $ext, 'line' => $t[$i][2], 'start' => $i, 'end' => $end];
    }
    return $out;
}

function piecesBetween(array $t, int $from, int $to, string $kind): array
{
    $pieces = [];
    $k = $from;
    while ($k <= $to) {
        if ($t[$k][0] === T_ENCAPSED_AND_WHITESPACE) {
            $pieces[] = ['t' => 'lit', 'idx' => $k, 'kind' => $kind, 'text' => $t[$k][1], 'wrap' => ''];
            $k++;
        } else {
            $s = $k;
            while ($k <= $to && $t[$k][0] !== T_ENCAPSED_AND_WHITESPACE) {
                $k++;
            }
            $pieces[] = ['t' => 'opq', 'from' => $s, 'to' => $k - 1];
        }
    }
    return $pieces;
}

/** A single PHP string expression starting at token $i: 'x', "x", "x $y", or heredoc. */
function parseStringGroup(array $t, int $i): ?array
{
    $n = count($t);
    $ty = $t[$i][0];
    if ($ty === T_CONSTANT_ENCAPSED_STRING) {
        $raw = $t[$i][1];
        $q = $raw[0];
        if ($q !== "'" && $q !== '"') {
            return null;
        }
        return ['start' => $i, 'end' => $i, 'pieces' => [[
            't' => 'lit', 'idx' => $i, 'kind' => $q === "'" ? 'sq' : 'dq', 'text' => substr($raw, 1, -1), 'wrap' => $q,
        ]]];
    }
    if ($ty === T_START_HEREDOC) {
        $j = $i + 1;
        while ($j < $n && $t[$j][0] !== T_END_HEREDOC) {
            $j++;
        }
        if ($j >= $n) {
            return null;
        }
        return ['start' => $i, 'end' => $j, 'pieces' => piecesBetween($t, $i + 1, $j - 1, 'hd')];
    }
    if ($ty === '"') {
        $j = $i + 1;
        while ($j < $n && $t[$j][0] !== '"') {
            $j++;
        }
        if ($j >= $n) {
            return null;
        }
        return ['start' => $i, 'end' => $j, 'pieces' => piecesBetween($t, $i + 1, $j - 1, 'dq')];
    }
    return null;
}

const OPERAND_STOP = [';', ',', ')', ']', '}', '?', ':', '=>', '=', '==', '===', '!=', '!==', '<>', '<', '>', '<=', '>=', '&&', '||', '??', '.'];

/** Index of the last token of a non-string operand that starts at $a. */
function operandEnd(array $t, int $a): int
{
    $depth = 0;
    $last = $a;
    for ($k = $a, $n = count($t); $k < $n; $k++) {
        if (isTrivia($t[$k])) {
            continue;
        }
        $x = $t[$k][0];
        $tx = $t[$k][1];
        if ($tx === '(' || $tx === '[' || isOpenBrace($x)) {
            $depth++;
        } elseif ($tx === ')' || $tx === ']' || $tx === '}') {
            if ($depth === 0) {
                return $last;
            }
            $depth--;
        } elseif ($depth === 0 && (in_array($tx, OPERAND_STOP, true)
            || $x === T_LOGICAL_AND || $x === T_LOGICAL_OR || $x === T_LOGICAL_XOR)) {
            return $last;
        }
        $last = $k;
    }
    return $last;
}

/* Literal decoding / encoding (keeps PHP escapes round-trip safe) */

function decodeLit(string $raw, string $kind): ?string
{
    if (preg_match('/[\x01-\x07\x0E]/', $raw)) {
        return null;
    }
    if ($kind === 'sq') {
        $s = strtr($raw, ["\\\\" => "\x04", "\\'" => "'"]);
    } elseif ($kind === 'dq') {
        $s = strtr($raw, ["\\\\" => "\x04", '\\"' => '"', '\\$' => "\x05", '\\n' => "\x06", '\\r' => "\x07", '\\t' => "\x0E"]);
    } else {
        $s = $raw;
    }
    return str_contains($s, '\\') ? null : $s;
}

function encodeLit(string $s, string $kind): string
{
    if ($kind === 'sq') {
        return strtr($s, ["\x04" => "\\\\", "'" => "\\'"]);
    }
    if ($kind === 'dq') {
        return strtr($s, ["\x04" => "\\\\", '"' => '\\"', "\x05" => '\\$', "\x06" => '\\n', "\x07" => '\\r', "\x0E" => '\\t']);
    }
    return $s;
}

/* ================================================================== */
/* PART B: SQL identifier quoter                                       */
/* ================================================================== */

final class SqlQuoter
{
    public int $count = 0;
    private array $t = [];
    private array $stack = [];
    private int $lastFunc = -1;
    private int $iv = 0;
    private bool $isFirst = false;

    /** Words that are never function names even when followed by "(". */
    private const NOFUNC = [
        'and', 'or', 'not', 'in', 'exists', 'any', 'some', 'all', 'like', 'between', 'is', 'regexp', 'rlike', 'xor',
        'div', 'case', 'when', 'then', 'else', 'as', 'distinct', 'on', 'using', 'set', 'where', 'having', 'select',
        'from', 'join', 'group', 'order', 'union', 'into', 'update', 'delete', 'limit', 'by', 'inner', 'outer',
        'cross', 'natural', 'straight_join', 'interval', 'binary', 'collate', 'escape', 'separator',
    ];

    /** Keywords that are always left alone. */
    private const OPKW = [
        'and', 'or', 'not', 'in', 'exists', 'any', 'some', 'all', 'like', 'between', 'is', 'regexp', 'rlike', 'xor',
        'div', 'mod', 'case', 'when', 'then', 'else', 'as', 'asc', 'desc', 'distinct', 'distinctrow', 'null', 'true',
        'false', 'unknown', 'binary', 'collate', 'escape', 'separator', 'default', 'low_priority', 'quick', 'delayed',
        'high_priority', 'sql_calc_found_rows', 'sql_no_cache', 'sql_cache', 'inner', 'outer', 'cross', 'natural',
        'left', 'right', 'current_timestamp', 'current_date', 'current_time', 'localtime', 'localtimestamp',
    ];

    public function __construct(private bool $colsOnly = false)
    {
    }

    public function run(string $sql, string $initClause): string
    {
        $this->t = $this->tokenize($sql);
        $this->stack = [$this->scope($initClause)];
        $this->lastFunc = -1;
        $out = '';
        for ($i = 0, $n = count($this->t); $i < $n; $i++) {
            [$ty, $tx] = $this->t[$i];
            if (in_array($ty, ['WS', 'BOUND', 'COMMENT'], true)) {
                $out .= $tx;
                continue;
            }
            $top = array_key_last($this->stack);
            // per-token bookkeeping for the scope we are in
            $this->isFirst = $this->stack[$top]['first'];
            $this->stack[$top]['first'] = false;
            $this->iv = $this->stack[$top]['interval'];
            if ($this->iv === 1) {
                $this->stack[$top]['interval'] = 2;
            } elseif ($this->iv === 2) {
                $this->stack[$top]['interval'] = 0;
            }

            if ($ty === 'LP') {
                $out .= $tx;
                $this->openParen($i);
                continue;
            }
            if ($ty === 'RP') {
                $out .= $tx;
                if (count($this->stack) > 1) {
                    array_pop($this->stack);
                }
                continue;
            }
            if ($ty === 'WORD' && $this->word($i)) {
                $out .= '`' . $tx . '`';
                $this->count++;
                continue;
            }
            $out .= $tx;
        }
        return $out;
    }

    private function scope(string $clause, bool $verbatim = false): array
    {
        return [
            'clause' => $clause, 'verb' => null, 'func' => null, 'pendingCols' => false, 'skipParen' => false,
            'first' => true, 'interval' => 0, 'case' => 0, 'verbatim' => $verbatim,
        ];
    }

    private function openParen(int $i): void
    {
        $top = array_key_last($this->stack);
        $sc = $this->stack[$top];
        $p = $this->prevSig($i);
        if ($sc['skipParen']) {
            $this->stack[$top]['skipParen'] = false;
            $this->stack[] = $this->scope('none', true);
            return;
        }
        if ($this->nextWord($i) === 'select') {
            $this->stack[] = $this->scope('start');
            return;
        }
        $pTy = $p >= 0 ? $this->t[$p][0] : null;
        if ($sc['pendingCols'] || ($sc['clause'] === 'table' && in_array($sc['verb'], ['insert', 'replace'], true)
                && in_array($pTy, ['WORD', 'BT'], true))) {
            $this->stack[$top]['pendingCols'] = false;
            $this->stack[] = $this->scope('cols');
            return;
        }
        if ($p >= 0 && $p === $this->lastFunc) {
            $s = $this->scope('expr');
            $s['func'] = $this->coreLower($this->t[$p][1]);
            $this->stack[] = $s;
            return;
        }
        $inherit = in_array($sc['clause'], ['table', 'values', 'select', 'expr'], true) ? $sc['clause'] : 'expr';
        $this->stack[] = $this->scope($inherit);
    }

    /** Returns true when the WORD token at $i must be wrapped in backticks. */
    private function word(int $i): bool
    {
        $top = array_key_last($this->stack);
        $sc =& $this->stack[$top];
        $tx = $this->t[$i][1];
        $hasOpq = str_contains($tx, "\x01");
        $core = $this->core($tx);
        $lc = strtolower($core);
        $p = $this->prevSig($i);
        $nx = $this->nextSig($i);
        $prevTy = $p >= 0 ? $this->t[$p][0] : null;
        $prevWord = $prevTy === 'WORD' ? $this->coreLower($this->t[$p][1]) : null;
        $nextTy = $nx >= 0 ? $this->t[$nx][0] : null;
        $nextWord = $this->nextWord($i);
        $nextIsLP = $nextTy === 'LP';
        $clause = $sc['clause'];
        $f = $sc['func'];

        if ($sc['verbatim']) {
            return false;
        }
        if ($core === '') {
            return false; // lone interpolation, e.g. FROM {$table}
        }
        if ($hasOpq) {
            return !$nextIsLP && !in_array($clause, ['limit', 'tail', 'head', 'start', 'none', 'values'], true)
                && !($this->colsOnly && $clause === 'table');
        }
        if ($prevTy === 'DOT') {
            return true;
        }
        if ($this->iv === 2) {
            return false; // INTERVAL 1 DAY
        }
        if ($prevWord === 'as') {
            if (in_array($f, ['cast', 'convert'], true)) {
                return false;
            }
            return !($this->colsOnly && $clause === 'table');
        }
        if ($prevWord === 'collate' || ($prevWord === 'using' && $f === 'convert')) {
            return false;
        }
        if ($f === 'against') {
            return false;
        }
        if ($this->isFirst && in_array($f, ['timestampdiff', 'timestampadd', 'extract'], true)) {
            return false;
        }
        if ($f === 'trim' && in_array($lc, ['both', 'leading', 'trailing'], true)) {
            return false;
        }
        if (in_array($lc, ['date', 'time', 'timestamp', 'datetime'], true) && $nextTy === 'STR') {
            return false;
        }

        switch ($lc) {
            case 'select':
                $sc['clause'] = 'select';
                $sc['verb'] ??= 'select';
                return false;
            case 'from':
                if (in_array($f, ['extract', 'trim', 'substring', 'substr', 'position'], true)) {
                    return false;
                }
                $sc['clause'] = 'table';
                return false;
            case 'join':
            case 'straight_join':
                $sc['clause'] = 'table';
                return false;
            case 'into':
                $sc['clause'] = in_array($nextWord, ['outfile', 'dumpfile'], true) ? 'tail' : 'table';
                return false;
            case 'update':
                if ($prevWord === 'key') {
                    $sc['clause'] = 'expr';
                } elseif ($prevWord === 'for') {
                    $sc['clause'] = 'tail';
                } elseif ($sc['verb'] === null) {
                    $sc['verb'] = 'update';
                    $sc['clause'] = 'table';
                } else {
                    $sc['clause'] = 'expr';
                }
                return false;
            case 'set':
            case 'where':
            case 'having':
            case 'on':
                $sc['clause'] = 'expr';
                return false;
            case 'duplicate':
                if ($prevWord === 'on') {
                    return false;
                }
                break;
            case 'key':
                if (in_array($prevWord, ['duplicate', 'use', 'force', 'ignore'], true)) {
                    return false;
                }
                break;
            case 'index':
                if (in_array($prevWord, ['use', 'force', 'ignore'], true)) {
                    return false;
                }
                break;
            case 'group':
            case 'order':
                if ($nextWord === 'by') {
                    $sc['clause'] = 'expr';
                    return false;
                }
                break;
            case 'by':
                return false;
            case 'limit':
                $sc['clause'] = 'limit';
                return false;
            case 'offset':
                if ($clause === 'limit') {
                    return false;
                }
                break;
            case 'union':
                $sc['clause'] = 'start';
                return false;
            case 'delete':
                if ($sc['verb'] === null) {
                    $sc['verb'] = 'delete';
                    $sc['clause'] = 'head';
                }
                return false;
            case 'insert':
            case 'replace':
                if ($nextIsLP) {
                    $this->lastFunc = $i;
                    return false;
                }
                if ($sc['verb'] === null) {
                    $sc['verb'] = $lc;
                    $sc['clause'] = 'head';
                }
                return false;
            case 'values':
            case 'value':
                if (in_array($sc['verb'], ['insert', 'replace'], true) && in_array($clause, ['table', 'cols', 'head', 'start'], true)) {
                    $sc['clause'] = 'values';
                    return false;
                }
                if ($nextIsLP) {
                    $this->lastFunc = $i;
                    return false;
                }
                break;
            case 'using':
                if ($f !== 'convert' && $clause === 'table') {
                    $sc['pendingCols'] = true;
                }
                return false;
            case 'for':
                if (in_array($nextWord, ['update', 'share'], true)) {
                    $sc['clause'] = 'tail';
                    return false;
                }
                break;
            case 'lock':
                if ($nextWord === 'in') {
                    $sc['clause'] = 'tail';
                    return false;
                }
                break;
            case 'use':
            case 'force':
                if ($clause === 'table' && in_array($nextWord, ['index', 'key'], true)) {
                    $sc['skipParen'] = true;
                    return false;
                }
                break;
            case 'ignore':
                if ($clause === 'table' && in_array($nextWord, ['index', 'key'], true)) {
                    $sc['skipParen'] = true;
                }
                return false;
            case 'case':
                $sc['case']++;
                return false;
            case 'end':
                if ($sc['case'] > 0) {
                    $sc['case']--;
                    return false;
                }
                break;
            case 'dual':
                if ($clause === 'table') {
                    return false;
                }
                break;
            case 'interval':
                $sc['interval'] = 1;
                return false;
        }

        if (in_array($lc, self::OPKW, true)) {
            if (in_array($lc, ['left', 'right', 'mod'], true) && $nextIsLP) {
                $this->lastFunc = $i;
            }
            return false;
        }
        if ($nextIsLP && $clause !== 'table' && !in_array($lc, self::NOFUNC, true)) {
            $this->lastFunc = $i;
            return false; // function call
        }
        if ($nextTy === 'DOT') {
            return !$this->colsOnly; // qualifier: table or alias
        }
        return match ($clause) {
            'select', 'expr', 'cols' => true,
            'table' => !$this->colsOnly,
            default => false,
        };
    }

    private function core(string $s): string
    {
        return (string)preg_replace("/\x01\d+\x02|\x03/", '', $s);
    }

    private function coreLower(string $s): string
    {
        return strtolower($this->core($s));
    }

    private function prevSig(int $i): int
    {
        while (--$i >= 0) {
            if (!in_array($this->t[$i][0], ['WS', 'BOUND', 'COMMENT'], true)) {
                return $i;
            }
        }
        return -1;
    }

    private function nextSig(int $i): int
    {
        for ($n = count($this->t); ++$i < $n;) {
            if (!in_array($this->t[$i][0], ['WS', 'BOUND', 'COMMENT'], true)) {
                return $i;
            }
        }
        return -1;
    }

    private function nextWord(int $i): ?string
    {
        $nx = $this->nextSig($i);
        if ($nx >= 0 && $this->t[$nx][0] === 'WORD') {
            return $this->coreLower($this->t[$nx][1]);
        }
        return null;
    }

    private function tokenize(string $s): array
    {
        $word = '(?:[A-Za-z_]|\x01\d+\x02)(?:[\w$]|\x03|\x01\d+\x02)*';
        $rules = [
            ['WS', '/\G[\s\x06\x07\x0E]+/'],
            ['BOUND', '/\G\x03/'],
            ['STR', '/\G\'(?:[^\'\\\\\x04]|[\\\\\x04].|\'\')*(?:\'|\z)/s'],
            ['STR', '/\G"(?:[^"\\\\\x04]|[\\\\\x04].|"")*(?:"|\z)/s'],
            ['BT', '/\G`[^`]*(?:`|\z)/'],
            ['COMMENT', '/\G\/\*.*?(?:\*\/|\z)/s'],
            ['COMMENT', '/\G--[ \t][^\n]*/'],
            ['NUM', '/\G(?:0x[0-9a-fA-F]+|\d+(?:\.\d+)?(?:[eE][+-]?\d+)?)(?![\w$])/'],
            ['WORD', '/\G' . $word . '/'],
            ['VAR', '/\G@@?[A-Za-z_][\w$]*/'],
            ['PH', '/\G:[A-Za-z_]\w*/'],
        ];
        $single = ['.' => 'DOT', ',' => 'COMMA', '(' => 'LP', ')' => 'RP', ';' => 'SEMI', '?' => 'PH'];
        $toks = [];
        $i = 0;
        $n = strlen($s);
        while ($i < $n) {
            $matched = false;
            foreach ($rules as [$type, $re]) {
                if (preg_match($re, $s, $m, 0, $i) === 1 && $m[0] !== '') {
                    $toks[] = [$type, $m[0]];
                    $i += strlen($m[0]);
                    $matched = true;
                    break;
                }
            }
            if (!$matched) {
                $c = $s[$i];
                $toks[] = [$single[$c] ?? 'OP', $c];
                $i++;
            }
        }
        return $toks;
    }
}

/* ================================================================== */
/* PART B: Statement detection                                         */
/* ================================================================== */

/** @return array{0:?string,1:string} [mode, initial clause] */
function classifySql(string $probe, bool $allowFragments): array
{
    if (preg_match('/<\/?[a-z][^>]*>/i', $probe)) {
        return [null, 'start']; // looks like HTML, not SQL
    }
    $stmt = [
        '/^\s*\(*\s*select\s+.+?\sfrom\s+[`\w(]/is',
        '/^\s*insert\s+(?:(?:low_priority|delayed|high_priority|ignore)\s+)*into\s+[`\w]/i',
        '/^\s*replace\s+(?:(?:low_priority|delayed)\s+)?into\s+[`\w]/i',
        '/^\s*update\s+(?:(?:low_priority|ignore)\s+)*[`\w][\s\S]*\bset\b/i',
        '/^\s*delete\s+(?:(?:low_priority|quick|ignore)\s+)*(?:[`\w.,\s]+\s+)?from\s+[`\w]/i',
    ];
    foreach ($stmt as $re) {
        if (preg_match($re, $probe)) {
            if (empty($GLOBALS['allowMixedCase']) && !consistentKeywordCase($probe)) {
                return ['prose', 'start'];
            }
            return ['stmt', 'start'];
        }
    }
    if ($allowFragments) {
        $op = '(?:=|<=>|<>|!=|<=|>=|<|>|\blike\b|\bin\b|\bis\b|\bbetween\b|\bnot\b)';
        if (preg_match('/^\s*(?:and|or|where|having|on)\s+\(*\s*[`\w.$]+\s*' . $op . '/i', $probe)
            || preg_match('/^\s*(?:order|group)\s+by\s+[`\w.$]+/i', $probe)) {
            return ['fragment', 'expr'];
        }
        if (preg_match('/^\s*(?:(?:left|right|inner|cross|natural)\s+(?:outer\s+)?)?join\s+[`\w$]+[\s\S]*\bon\b/i', $probe)) {
            return ['fragment', 'table'];
        }
    }
    return [null, 'start'];
}

/** "Select an option from the list" mixes Title and lower case; real SQL keeps one style. */
function consistentKeywordCase(string $probe): bool
{
    if (!preg_match('/^\s*\(*\s*([A-Za-z]+)\b/', $probe, $a)) {
        return true;
    }
    if (!preg_match('/\b(from|into|set)\b/i', $probe, $b)) {
        return true;
    }
    $style = fn(string $w) => $w === strtoupper($w) ? 'U' : ($w === strtolower($w) ? 'L' : 'T');
    return $style($a[1]) === $style($b[1]);
}

function looksUnhandled(string $probe): ?string
{
    if (preg_match('/^\s*(create|alter|drop|truncate|rename)\s+(temporary\s+)?(table|database|schema|index|view)\b/i', $probe, $m)) {
        return strtoupper($m[1]) . ' ' . strtoupper($m[3]);
    }
    if (preg_match('/^\s*show\s+(tables|full|columns|fields|create|index|databases|status|variables)\b/i', $probe)) {
        return 'SHOW';
    }
    if (preg_match('/^\s*(?:describe|desc)\s+[`\w]+\s*$/i', $probe)) {
        return 'DESCRIBE';
    }
    if (preg_match('/^\s*with\s+\w+\s+as\s*\(/i', $probe)) {
        return 'WITH (CTE)';
    }
    return null;
}

/* ================================================================== */
/* PART B: per-file backtick processing                                */
/* ================================================================== */

/** @return array{0:string,1:list<array>,2:list<array>,3:list<array>} [newCode, changes, manual, classes] */
function processCode(string $code, bool $scopeAll, bool $colsOnly, bool $fragments): array
{
    $t = lex($code);
    $n = count($t);
    $classes = findClasses($t);
    $inClass = [];
    foreach ($classes as $c) {
        for ($k = $c['start']; $k <= $c['end']; $k++) {
            $inClass[$k] = $c['name'];
        }
    }
    foreach ($classes as $ci => $c) {
        $classes[$ci]['sql'] = 0;
        $classes[$ci]['changed'] = 0;
    }

    $changes = [];
    $manual = [];
    $done = [];

    for ($i = 0; $i < $n; $i++) {
        if (isset($done[$i])) {
            $i = $done[$i];
            continue;
        }
        if (!$scopeAll && !isset($inClass[$i])) {
            continue;
        }
        $g = parseStringGroup($t, $i);
        if ($g === null) {
            continue;
        }
        $firstEnd = $g['end'];
        $startLine = $t[$i][2];
        $owner = $inClass[$i] ?? null;

        // ---- build the concatenation chain ----
        $items = $g['pieces'];
        $end = $g['end'];
        $done[$g['start']] = $g['end'];
        while (true) {
            $dot = nextSig($t, $end);
            if ($dot < 0 || $t[$dot][1] !== '.') {
                break;
            }
            $a = nextSig($t, $dot);
            if ($a < 0) {
                break;
            }
            $g2 = parseStringGroup($t, $a);
            if ($g2 !== null) {
                $items = array_merge($items, $g2['pieces']);
                $done[$g2['start']] = $g2['end'];
                $end = $g2['end'];
                continue;
            }
            $e = operandEnd($t, $a);
            $items[] = ['t' => 'opq', 'from' => $a, 'to' => $e];
            $end = $e;
        }

        // ---- join into one SQL text ----
        $joined = '';
        $prev = null;
        $k = 0;
        $abort = null;
        foreach ($items as $idx => $it) {
            if ($it['t'] === 'lit') {
                $dec = decodeLit($it['text'], $it['kind']);
                if ($dec === null) {
                    $abort = 'contains escapes or control characters the tool will not touch';
                    break;
                }
                $items[$idx]['dec'] = $dec;
                if ($prev === 'lit') {
                    $joined .= "\x03";
                }
                $joined .= $dec;
            } else {
                $joined .= "\x01" . $k++ . "\x02";
            }
            $prev = $it['t'];
        }
        if ($abort !== null) {
            $probeRaw = $t[$i][1];
            if (preg_match('/\b(select|insert|update|delete)\b/i', $probeRaw) && preg_match('/\b(from|into|set)\b/i', $probeRaw)) {
                $manual[] = ['line' => $startLine, 'class' => $owner, 'why' => $abort, 'sql' => trim(preg_replace('/\s+/', ' ', $probeRaw))];
            }
            $i = $firstEnd;
            continue;
        }

        $probe = preg_replace(["/\x01\d+\x02/", "/\x03/", '/[\x06\x07\x0E]/'], ['x', '', ' '], $joined);
        [$mode, $init] = classifySql($probe, $fragments);
        if ($mode === 'prose') {
            $manual[] = ['line' => $startLine, 'class' => $owner, 'why' => 'keywords use mixed case, looks like text, not SQL: left unchanged', 'sql' => trim((string)preg_replace('/\s+/', ' ', $probe))];
            $i = $firstEnd;
            continue;
        }
        if ($mode === null) {
            $why = looksUnhandled($probe);
            if ($why !== null) {
                $manual[] = ['line' => $startLine, 'class' => $owner, 'why' => "$why statement not handled automatically", 'sql' => trim(preg_replace('/\s+/', ' ', $probe))];
            }
            $i = $firstEnd;
            continue;
        }

        if ($owner !== null) {
            foreach ($classes as $ci => $c) {
                if ($c['name'] === $owner && $c['start'] <= $i && $i <= $c['end']) {
                    $classes[$ci]['sql']++;
                }
            }
        }

        $q = new SqlQuoter($colsOnly);
        $res = $q->run($joined, $init);
        if ($res === $joined) {
            $i = $firstEnd;
            continue;
        }
        if (str_replace('`', '', $res) !== str_replace('`', '', $joined)) {
            $manual[] = ['line' => $startLine, 'class' => $owner, 'why' => 'internal safety check failed, left unchanged', 'sql' => trim(preg_replace('/\s+/', ' ', $probe))];
            $i = $firstEnd;
            continue;
        }

        // ---- split the result back onto the original string tokens ----
        $texts = [];
        $pos = 0;
        $prev = null;
        $k = 0;
        $ok = true;
        foreach ($items as $idx => $it) {
            if ($it['t'] === 'lit') {
                if ($prev === 'lit') {
                    if (($res[$pos] ?? '') !== "\x03") {
                        $ok = false;
                        break;
                    }
                    $pos++;
                }
                $len = strcspn($res, "\x01\x03", $pos);
                $texts[$idx] = substr($res, $pos, $len);
                $pos += $len;
            } else {
                $mk = "\x01" . $k++ . "\x02";
                if (strcspn($res, "\x01\x03", $pos) > 0 || substr($res, $pos, strlen($mk)) !== $mk) {
                    $ok = false;
                    break;
                }
                $pos += strlen($mk);
            }
            $prev = $it['t'];
        }
        if ($ok && $pos !== strlen($res)) {
            $ok = false;
        }
        if (!$ok) {
            $manual[] = ['line' => $startLine, 'class' => $owner, 'why' => 'dynamic identifier (variable) at a quoting boundary: quote it manually', 'sql' => trim(preg_replace('/\s+/', ' ', $probe))];
            $i = $firstEnd;
            continue;
        }

        foreach ($items as $idx => $it) {
            if ($it['t'] !== 'lit') {
                continue;
            }
            $enc = encodeLit($texts[$idx], $it['kind']);
            $t[$it['idx']][1] = $it['wrap'] !== '' ? $it['wrap'] . $enc . $it['wrap'] : $enc;
        }

        $show = fn(string $s) => trim((string)preg_replace(['/\x01\d+\x02/', '/\x03/', '/\x04/', '/\x05/', '/[\x06\x07\x0E]|\s+/'], ['{$expr}', '', '\\', '$', ' '], $s));
        $changes[] = ['line' => $startLine, 'class' => $owner, 'mode' => $mode, 'count' => $q->count, 'before' => $show($joined), 'after' => $show($res)];
        if ($owner !== null) {
            foreach ($classes as $ci => $c) {
                if ($c['name'] === $owner && $c['start'] <= $i && $i <= $c['end']) {
                    $classes[$ci]['changed']++;
                }
            }
        }
        $i = $firstEnd;
    }
    return [unlex($t), $changes, $manual, $classes];
}

/* ================================================================== */
/* SHARED: file handling                                               */
/* ================================================================== */

function collectFiles(array $paths, array $exts, array $skipDirs): array
{
    $files = [];
    foreach ($paths as $path) {
        if (is_file($path)) {
            $files[] = realpath($path);
            continue;
        }
        if (!is_dir($path)) {
            fwrite(STDERR, "Skipping missing path: $path\n");
            continue;
        }
        $it = new RecursiveIteratorIterator(new RecursiveCallbackFilterIterator(
            new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
            fn(SplFileInfo $f) => !($f->isDir() && in_array($f->getFilename(), $skipDirs, true))
        ));
        foreach ($it as $f) {
            if ($f->isFile() && in_array(strtolower($f->getExtension()), $exts, true)) {
                $files[] = $f->getRealPath();
            }
        }
    }
    sort($files);
    return array_values(array_unique($files));
}

function lintCode(string $code, string $display): ?string
{
    $tmp = tempnam(sys_get_temp_dir(), 'lint');
    file_put_contents($tmp, $code);
    exec(escapeshellarg(PHP_BINARY) . ' -d display_errors=1 -l ' . escapeshellarg($tmp) . ' 2>&1', $o, $rc);
    unlink($tmp);
    return $rc === 0 ? null : str_replace($tmp, $display, trim(implode("\n", $o)));
}

function cut(string $s, int $w): string
{
    return strlen($s) > $w ? substr($s, 0, $w - 1) . '~' : $s;
}

function relPath(string $file, string $cwd): string
{
    return str_starts_with($file, $cwd . DIRECTORY_SEPARATOR) ? substr($file, strlen($cwd) + 1) : $file;
}

/* ================================================================== */
/* init: tooling config                                                */
/* ================================================================== */

function cmdInit(array $paths): int
{
    $dirs = array_map(fn($p) => "__DIR__ . '/" . ltrim(str_replace('\\', '/', $p), './') . "'", $paths ?: ['src']);
    $rector = "<?php\ndeclare(strict_types=1);\n\nuse Rector\\Config\\RectorConfig;\n\n"
        . "// Run AFTER this tool's --write pass. Requires: composer require --dev rector/rector\n"
        . "return RectorConfig::configure()\n"
        . "    ->withPaths([" . implode(', ', $dirs) . "])\n"
        . "    ->withSkip([__DIR__ . '/vendor'])\n"
        . "    ->withPhpSets(php84: true)          // PHP 5.3 -> 8.4 language upgrades\n"
        . "    ->withPreparedSets(deadCode: true); // removes the `if (false)` left by magic_quotes fixes\n";
    if (file_exists('rector.php')) {
        echo "rector.php already exists - not overwritten.\n";
    } else {
        file_put_contents('rector.php', $rector);
        echo "Created rector.php\n";
    }
    echo <<<TXT

Recommended toolchain (run with PHP 8.4.27, NOT on the 5.3.10 server):

  composer require --dev rector/rector squizlabs/php_codesniffer phpcompatibility/php-compatibility

  # 1. this tool: PHP 8.4 fixes + SQL backticks (dry-run first, then apply)
  php tools/php53-to-84-refactor.php run src
  php tools/php53-to-84-refactor.php run src --write --tasks=refactor-tasks.md

  #    SQL backticks only
  php tools/php53-to-84-refactor.php backticks src
  php tools/php53-to-84-refactor.php backticks src --write

  # 2. Rector for broader modernisation
  vendor/bin/rector process --dry-run
  vendor/bin/rector process

  # 3. Independent compatibility check
  vendor/bin/phpcs -p --standard=PHPCompatibility --runtime-set testVersion 8.4- src

TXT;
    return 0;
}

/* ================================================================== */
/* main                                                                */
/* ================================================================== */

function usage(): void
{
    echo <<<TXT
PHP 5.3.10 -> 8.4.27 refactor helper + SQL backtick tool

Usage:
  php php53-to-84-refactor.php run       <path...> [options]   PHP 8.4 fixes + SQL backticks
  php php53-to-84-refactor.php backticks <path...> [options]   SQL backticks only
  php php53-to-84-refactor.php init      [path...]             Generate rector.php + show toolchain

General options:
  --write              Apply changes (default is dry-run)
  --no-backup          Do not copy originals to .refactor-backup/<timestamp>/
  --no-lint            Skip php -l on the changed output
  --ext=php,inc,...    File extensions (default: php,inc,phtml,module,install)
  --exclude=a,b        Extra directory names to skip (vendor, .git, node_modules always skipped)
  --report=file.json   Write full findings as JSON
  --tasks=file.md      Write a per-file task list (paste into GitHub Copilot chat)
  --quiet              Only print the class list and summary

SQL backtick options (used by "run" and "backticks"):
  --no-backticks       ("run" only) skip the backtick pass
  --scope=classes|all  classes (default): only SQL inside class bodies; all: every string in the file
  --columns-only       Quote columns and aliases only; leave table names (and table aliases) unquoted
  --no-fragments       Skip partial SQL strings (" AND x = 1", " ORDER BY y")
  --allow-mixed-case   Also quote SQL with mixed-case keywords ("Insert INTO", "Select ... from"); review the diff

TXT;
}

$args = array_slice($argv, 1);
$opts = [];
$pos = [];
foreach ($args as $a) {
    if (str_starts_with($a, '--')) {
        $kv = explode('=', substr($a, 2), 2);
        $opts[$kv[0]] = $kv[1] ?? true;
    } else {
        $pos[] = $a;
    }
}
$cmd = $pos ? array_shift($pos) : 'help';

if (isset($opts['help']) || $cmd === 'help') {
    usage();
    exit(0);
}
if ($cmd === 'init') {
    exit(cmdInit($pos));
}
if (!in_array($cmd, ['run', 'backticks'], true) || !$pos) {
    usage();
    exit(1);
}

$doRefactor = $cmd === 'run';
$doTicks = $cmd === 'backticks' || !isset($opts['no-backticks']);
$write = isset($opts['write']);
$scopeAll = ($opts['scope'] ?? 'classes') === 'all';
$colsOnly = isset($opts['columns-only']);
$fragments = !isset($opts['no-fragments']);
$GLOBALS['allowMixedCase'] = isset($opts['allow-mixed-case']);
$quiet = isset($opts['quiet']);
$exts = array_map('trim', explode(',', is_string($opts['ext'] ?? null) ? $opts['ext'] : 'php,inc,phtml,module,install'));
$skip = array_merge(['vendor', '.git', 'node_modules', '.refactor-backup'],
    is_string($opts['exclude'] ?? null) ? explode(',', $opts['exclude']) : []);
$cwd = getcwd();
$backupDir = $cwd . '/.refactor-backup/' . date('Ymd-His');
$files = collectFiles($pos, $exts, $skip);

echo ($write ? "MODE: WRITE" : "MODE: DRY-RUN (no files modified; add --write to apply)")
    . "  steps=" . implode('+', array_filter([$doRefactor ? 'php84-fixes' : null, $doTicks ? 'sql-backticks' : null]))
    . ($doTicks ? "  scope=" . ($scopeAll ? 'all' : 'classes') . ($colsOnly ? '  columns-only' : '') : '') . "\n";
echo "Scanning " . count($files) . " file(s) with PHP " . PHP_VERSION . "\n\n";

$allFindings = [];
$fixTotals = [];
$classRows = [];
$changed = 0;
$queriesChanged = 0;
$namesQuoted = 0;
$manualCount = 0;
$lintFails = [];

foreach ($files as $file) {
    $rel = relPath($file, $cwd);
    $orig = (string)file_get_contents($file);
    $new = $orig;
    $fixes = [];
    $changes = [];
    $manual = [];
    $classes = [];

    // Step 1: PHP 8.4 mechanical fixes
    if ($doRefactor) {
        [$new, $fixes] = applyFixes($new);
        foreach ($fixes as $name => $c) {
            $fixTotals[$name] = ($fixTotals[$name] ?? 0) + $c;
        }
    }
    // Step 2: SQL backticks (runs on the output of step 1)
    if ($doTicks) {
        [$new, $changes, $manual, $classes] = processCode($new, $scopeAll, $colsOnly, $fragments);
        foreach ($classes as $c) {
            $classRows[] = [$rel, $c['name'], $c['extends'], $c['line'], $c['sql'], $c['changed']];
        }
        foreach ($changes as $c) {
            $queriesChanged++;
            $namesQuoted += $c['count'];
        }
        foreach ($manual as $m) {
            $manualCount++;
            $allFindings[] = [
                'file' => $rel, 'line' => $m['line'], 'sev' => 'warn', 'rule' => 'sql-backticks',
                'msg' => ($m['class'] ? "({$m['class']}) " : '') . $m['why'] . ': `` ' . $m['sql'] . ' ``',
            ];
        }
    }

    if ($new !== $orig) {
        $changed++;
        if (!$quiet) {
            if ($fixes) {
                echo "[FIX] $rel  (" . implode(', ', array_map(fn($k, $v) => "$k x$v", array_keys($fixes), $fixes)) . ")\n";
            }
            if ($changes) {
                echo "[SQL] $rel  (" . count($changes) . " quer" . (count($changes) === 1 ? 'y' : 'ies') . ")\n";
                foreach ($changes as $c) {
                    echo "  line {$c['line']}" . ($c['class'] ? " in {$c['class']}" : '') . ($c['mode'] === 'fragment' ? ' [fragment]' : '') . "\n";
                    echo "    - {$c['before']}\n    + {$c['after']}\n";
                }
            }
            echo "\n";
        }
        if ($write) {
            if (!isset($opts['no-backup'])) {
                $dest = $backupDir . '/' . ltrim($rel, '/');
                @mkdir(dirname($dest), 0775, true);
                copy($file, $dest);
            }
            file_put_contents($file, $new);
        }
    }

    if (!isset($opts['no-lint']) && ($doRefactor || $new !== $orig)) {
        $err = lintCode($new, $rel);
        if ($err !== null) {
            $lintFails[$rel] = $err;
            $allFindings[] = ['file' => $rel, 'line' => 0, 'sev' => 'error', 'rule' => 'parse-error',
                'msg' => 'does not parse on PHP ' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . ': ' . strtok($err, "\n")];
        }
    }
    if ($doRefactor) {
        foreach (scanFindings($new, $rel) as $f) {
            $allFindings[] = $f;
        }
    }
}

/* --- console report --- */
$bySev = ['error' => 0, 'warn' => 0, 'info' => 0];
$byRule = [];
foreach ($allFindings as $f) {
    $bySev[$f['sev']]++;
    $byRule[$f['sev'] . ' ' . $f['rule']] = ($byRule[$f['sev'] . ' ' . $f['rule']] ?? 0) + 1;
}

if (!$quiet) {
    echo "--- REMAINING ISSUES (manual / Copilot) ---\n";
    foreach ($allFindings as $f) {
        printf("[%-5s] %s:%d  %s - %s\n", strtoupper($f['sev']), $f['file'], $f['line'], $f['rule'], $f['msg']);
    }
    echo "\n";
}

if ($doTicks) {
    echo "=========== CLASSES FOUND (" . count($classRows) . ") ===========\n";
    printf("%-44s %-24s %-22s %5s %5s\n", 'file:line', 'class', 'extends', 'SQL', 'fixed');
    foreach ($classRows as [$f, $name, $ext, $line, $sql, $chg]) {
        printf("%-44s %-24s %-22s %5d %5d\n", cut("$f:$line", 44), cut($name, 24), cut((string)$ext, 22), $sql, $chg);
    }
    echo "\n";
}

echo "=========== SUMMARY ===========\n";
echo "Files scanned : " . count($files) . "\n";
echo "Files " . ($write ? "changed" : "that would change") . ": $changed\n";
if ($fixTotals) {
    echo "Auto-fixes:\n";
    foreach ($fixTotals as $k => $v) {
        echo "  - $k: $v\n";
    }
}
if ($doTicks) {
    echo "Classes found : " . count($classRows) . "\n";
    echo "SQL queries " . ($write ? "updated" : "to update") . ": $queriesChanged  ($namesQuoted names quoted)\n";
    echo "SQL manual review: $manualCount\n";
}
echo "Remaining: {$bySev['error']} error, {$bySev['warn']} warning, {$bySev['info']} info\n";
if ($byRule) {
    arsort($byRule);
    echo "Top rules:\n";
    foreach (array_slice($byRule, 0, 12, true) as $k => $v) {
        echo "  - $k: $v\n";
    }
}
if ($write && $changed && !isset($opts['no-backup'])) {
    echo "Backups: " . relPath($backupDir, $cwd) . "\n";
}
if ($lintFails) {
    echo count($lintFails) . " file(s) FAIL php -l on this PHP version:\n";
    foreach ($lintFails as $f => $e) {
        echo "  $f: " . strtok($e, "\n") . "\n";
    }
}

/* --- report files --- */
if (is_string($opts['report'] ?? null)) {
    file_put_contents($opts['report'], json_encode([
        'php' => PHP_VERSION, 'source' => '5.3.10', 'target' => '8.4.27',
        'mode' => $write ? 'write' : 'dry-run', 'command' => $cmd,
        'fixes' => $fixTotals,
        'sql_backticks' => $doTicks ? [
            'classes' => count($classRows), 'queries_changed' => $queriesChanged,
            'names_quoted' => $namesQuoted, 'manual_review' => $manualCount,
            'class_list' => array_map(fn($r) => [
                'file' => $r[0], 'class' => $r[1], 'extends' => $r[2], 'line' => $r[3], 'sql' => $r[4], 'fixed' => $r[5],
            ], $classRows),
        ] : null,
        'findings' => $allFindings,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "JSON report: {$opts['report']}\n";
}
if (is_string($opts['tasks'] ?? null)) {
    $grouped = [];
    foreach ($allFindings as $f) {
        $grouped[$f['file']][] = $f;
    }
    $md = "# PHP 5.3.10 -> 8.4.27 migration tasks\n\nTarget: PHP 8.4.27. Fix each item, keep behaviour identical, add tests where possible.\n"
        . "Items marked **sql-backticks** need backticks added by hand around table/column names; change nothing else in the query.\n\n";
    foreach ($grouped as $file => $items) {
        $md .= "## `$file`\n";
        foreach ($items as $f) {
            $md .= "- [ ] line {$f['line']} **{$f['rule']}** ({$f['sev']}): {$f['msg']}\n";
        }
        $md .= "\n";
    }
    file_put_contents($opts['tasks'], $md);
    echo "Task list: {$opts['tasks']}\n";
}

exit($bySev['error'] > 0 ? 1 : 0);