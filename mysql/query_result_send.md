```
#0  Field::send_text (this=0x55555900cbb0, protocol=0x555558ff5d60) at /web/mysql-5.7.25/sql/field.cc:1724
#1  0x000055555694614a in Protocol_text::store (this=0x555558ff5d60, field=0x55555900cbb0)
    at /web/mysql-5.7.25/sql/protocol_classic.cc:1415
#2  0x00005555563f1877 in Item_field::send (this=0x5555590359a8, protocol=0x555558ff5d60, buffer=0x7fffeca34b60)
    at /web/mysql-5.7.25/sql/item.cc:7806
#3  0x00005555569d2d2e in THD::send_result_set_row (this=0x555558ff4bc0, row_items=0x5555590346e8)
    at /web/mysql-5.7.25/sql/sql_class.cc:4681
#4  0x00005555569ccfd9 in Query_result_send::send_data (this=0x555559035838, items=...)
    at /web/mysql-5.7.25/sql/sql_class.cc:2721
#5  0x00005555569ebcfb in end_send (join=0x555558fe6b58, qep_tab=0x555558fe73b0, end_of_records=false)
    at /web/mysql-5.7.25/sql/sql_executor.cc:2914
#6  0x00005555569e8800 in evaluate_join_record (join=0x555558fe6b58, qep_tab=0x555558fe7238)
    at /web/mysql-5.7.25/sql/sql_executor.cc:1645
#7  0x00005555569e7ba7 in sub_select (join=0x555558fe6b58, qep_tab=0x555558fe7238, end_of_records=false)
    at /web/mysql-5.7.25/sql/sql_executor.cc:1297
#8  0x00005555569e73a0 in do_select (join=0x555558fe6b58) at /web/mysql-5.7.25/sql/sql_executor.cc:950
#9  0x00005555569e5181 in JOIN::exec (this=0x555558fe6b58) at /web/mysql-5.7.25/sql/sql_executor.cc:199
#10 0x0000555556a868cc in handle_query (thd=0x555558ff4bc0, lex=0x555558ff6ee0, result=0x555559035838, added_options=0, 
    removed_options=0) at /web/mysql-5.7.25/sql/sql_select.cc:184
#11 0x0000555556a36d95 in execute_sqlcom_select (thd=0x555558ff4bc0, all_tables=0x5555590351f8)
    at /web/mysql-5.7.25/sql/sql_parse.cc:5144
#12 0x0000555556a2ff7a in mysql_execute_command (thd=0x555558ff4bc0, first_level=true)
    at /web/mysql-5.7.25/sql/sql_parse.cc:2816
#13 0x0000555556a37d14 in mysql_parse (thd=0x555558ff4bc0, parser_state=0x7fffeca36530)
    at /web/mysql-5.7.25/sql/sql_parse.cc:5570
#14 0x0000555556a2cc79 in dispatch_command (thd=0x555558ff4bc0, com_data=0x7fffeca36de0, command=COM_QUERY)
    at /web/mysql-5.7.25/sql/sql_parse.cc:1484
#15 0x0000555556a2bb03 in do_command (thd=0x555558ff4bc0) at /web/mysql-5.7.25/sql/sql_parse.cc:1025
#16 0x0000555556b6e228 in handle_connection (arg=0x555558e6c660)
    at /web/mysql-5.7.25/sql/conn_handler/connection_handler_per_thread.cc:306
#17 0x0000555557258162 in pfs_spawn_thread (arg=0x555558fa2040) at /web/mysql-5.7.25/storage/perfschema/pfs.cc:2190
#18 0x00007ffff75796db in start_thread (arg=0x7fffeca37700) at pthread_create.c:463
#19 0x00007ffff696388f in clone () at ../sysdeps/unix/sysv/linux/x86_64/clone.S:95
```
