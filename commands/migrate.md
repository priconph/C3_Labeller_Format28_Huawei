Migrate folder "$ARGUMENTS" to PHP 8.4.27.

1. Run `php -v` and `git status --porcelain`. Stop if PHP < 8.0 or the tree is dirty.
2. `git checkout -b php84/$ARGUMENTS`
3. Dry run: `php tools/php53-to-84-refactor.php run "$ARGUMENTS" --quiet --tasks=refactor-tasks.md --report=report.json`
   Show me only the SUMMARY block. Wait for my approval.
4. After approval, rerun with --write.
5. Work through refactor-tasks.md one file at a time. For each file, read only the matching
   guide section (3.1 DB, 3.2 input, 3.3 removed features, 3.4 behaviour, 3.5 AJAX), edit, tick the task.
6. Verify with the Phase 4 commands. Show failures only (pipe through `| head -40`).
7. Commit: php84($ARGUMENTS): migrate to PHP 8.4 (PDO, remove removed features)
8. Give the Phase 5 report in under 20 lines.