mysql备份脚本

```
./mysqldump -h 127.0.0.1 --default-character-set=utf8mb4 laravel --no-create-db --ignore-table=laravel.users --single-transaction --set-gtid-purged=OFF --result-file=/web/mysql-5.7.25/zhang/laravel.sql
```

mysql同步数据库

```
./mysql -h127.0.0.1 --default-character-set utf8mb4 laravel2 -e "source /web/mysql-5.7.25/zhang/laravel.sql"
```
