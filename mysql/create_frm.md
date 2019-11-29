```
#0  create_frm (thd=0x555558ff3860, name=0x7fffeca33d90 "./laravel/simple_frm.frm", db=0x555559033200 "laravel", 
    table=0x555559032c30 "simple_frm", reclength=98, fileinfo=0x7fffeca33ae0 " =\243", <incomplete sequence \354>, 
    create_info=0x7fffeca35690, keys=0, key_info=0x555559033870) at /web/mysql-5.7.25/sql/table.cc:3952
#1  0x0000555556b49109 in mysql_create_frm (thd=0x555558ff3860, file_name=0x7fffeca33d90 "./laravel/simple_frm.frm", 
    db=0x555559033200 "laravel", table=0x555559032c30 "simple_frm", create_info=0x7fffeca35690, create_fields=..., keys=0, 
    key_info=0x555559033870, db_file=0x555559033580) at /web/mysql-5.7.25/sql/unireg.cc:276
#2  0x0000555556b4a1ee in rea_create_table (thd=0x555558ff3860, path=0x7fffeca35150 "./laravel/simple_frm", 
    db=0x555559033200 "laravel", table_name=0x555559032c30 "simple_frm", create_info=0x7fffeca35690, create_fields=..., keys=0, 
    key_info=0x555559033870, file=0x555559033580, no_ha_table=false) at /web/mysql-5.7.25/sql/unireg.cc:541
#3  0x0000555556ac81f1 in create_table_impl (thd=0x555558ff3860, db=0x555559033200 "laravel", 
    table_name=0x555559032c30 "simple_frm", error_table_name=0x555559032c30 "simple_frm", 
    path=0x7fffeca35150 "./laravel/simple_frm", create_info=0x7fffeca35690, alter_info=0x7fffeca355e0, internal_tmp_table=false, 
    select_field_count=0, no_ha_table=false, is_trans=0x7fffeca353aa, key_info=0x7fffeca35140, key_count=0x7fffeca3513c)
    at /web/mysql-5.7.25/sql/sql_table.cc:5344
#4  0x0000555556ac8805 in mysql_create_table_no_lock (thd=0x555558ff3860, db=0x555559033200 "laravel", 
    table_name=0x555559032c30 "simple_frm", create_info=0x7fffeca35690, alter_info=0x7fffeca355e0, select_field_count=0, 
    is_trans=0x7fffeca353aa) at /web/mysql-5.7.25/sql/sql_table.cc:5474
#5  0x0000555556ac8923 in mysql_create_table (thd=0x555558ff3860, create_table=0x555559032c78, create_info=0x7fffeca35690, 
    alter_info=0x7fffeca355e0) at /web/mysql-5.7.25/sql/sql_table.cc:5518
#6  0x0000555556a3115b in mysql_execute_command (thd=0x555558ff3860, first_level=true) at /web/mysql-5.7.25/sql/sql_parse.cc:3276
#7  0x0000555556a37d14 in mysql_parse (thd=0x555558ff3860, parser_state=0x7fffeca36530) at /web/mysql-5.7.25/sql/sql_parse.cc:5570
---Type <return> to continue, or q <return> to quit---
#8  0x0000555556a2cc79 in dispatch_command (thd=0x555558ff3860, com_data=0x7fffeca36de0, command=COM_QUERY)
    at /web/mysql-5.7.25/sql/sql_parse.cc:1484
#9  0x0000555556a2bb03 in do_command (thd=0x555558ff3860) at /web/mysql-5.7.25/sql/sql_parse.cc:1025
#10 0x0000555556b6e228 in handle_connection (arg=0x5555590655a0)
    at /web/mysql-5.7.25/sql/conn_handler/connection_handler_per_thread.cc:306
#11 0x0000555557258162 in pfs_spawn_thread (arg=0x555558fc7e30) at /web/mysql-5.7.25/storage/perfschema/pfs.cc:2190
#12 0x00007ffff75796db in start_thread (arg=0x7fffeca37700) at pthread_create.c:463
#13 0x00007ffff696388f in clone () at ../sysdeps/unix/sysv/linux/x86_64/clone.S:95

```
