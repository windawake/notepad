mysql备份脚本

```
./mysqldump -h 127.0.0.1 --default-character-set=utf8mb4 --databases laravel --ignore-table=laravel.users,laravel.posts --single-transaction --set-gtid-purged=OFF  > /web/mysql-5.7.25/zhang/laravel.sql
```
