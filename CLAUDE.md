# PHP 5.3.10 → 8.4.27 migration
- Guide: php84-migrate-folder.prompt.md. Read only the section you need, never the whole file.
- Tool: tools/php53-to-84-refactor.php (never edit). Run only with PHP 8.4.27.
- One folder per session. Touch nothing outside it; folders not yet migrated must stay valid for PHP 5.3.10.
- Dry-run first; use --write only after I approve. Always pass --quiet.
- Never hard-code credentials. Never guess; list unknowns as open items.
- Bind all SQL parameters. Keep behaviour, request param names, session keys and JSON keys unchanged.
- Do not echo SQL or exception text to the browser; use error_log().
- Do not commit: *-tasks.md, report.json, .refactor-backup/