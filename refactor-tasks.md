# PHP 5.3.10 -> 8.4.27 migration tasks

Target: PHP 8.4.27. Fix each item, keep behaviour identical, add tests where possible.
Items marked **sql-backticks** need backticks added by hand around table/column names; change nothing else in the query.

## `\\RAPIDV2\WWW\C3_Labeller_Format28_Huawei\server_side\format28.php`
- [ ] line 60 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 63 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 73 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 74 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 88 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 115 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 135 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 177 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 177 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 186 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 186 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 187 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 195 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 195 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 196 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)
- [ ] line 211 **mysql_*** (error): ext/mysql removed in 7.0 -> PDO or mysqli with prepared statements (manual migration)

