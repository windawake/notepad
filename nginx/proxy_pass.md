一. location匹配路径末尾没有 /

此时proxy_pass后面的路径必须和location设置的路径一致：

```sh
location /index
{
   proxy_redirect off;
   proxy_set_header        Host $host;
   proxy_set_header        X-Real-IP $remote_addr;
   proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_pass http://localhost:8080/index;
}
```

外面访问：http://romotehost/index/index.html
相当于访问：http://localhost:8080/index/index.html


二. location匹配路径末尾有 /

此时proxy_pass后面的路径需要分为以下四种情况讨论：

proxy_pass后面的路径只有域名且最后没有 /：

```sh
location /index/
{
   proxy_redirect off;
   proxy_set_header        Host $host;
   proxy_set_header        X-Real-IP $remote_addr;
   proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_pass http://localhost:8080;
}
```

外面访问：http://romotehost/index/index.html
相当于访问：http://localhost:8080/index/index.html


proxy_pass后面的路径只有域名同时最后有 /：

```sh
location /index/
{
   proxy_redirect off;
   proxy_set_header        Host $host;
   proxy_set_header        X-Real-IP $remote_addr;
   proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_pass http://localhost:8080/;
}
```

外面访问：http://romotehost/index/index.html
相当于访问：http://localhost:8080/index.html


proxy_pass后面的路径还有其他路径但是最后没有 /：

```sh
location /index/
{
   proxy_redirect off;
   proxy_set_header        Host $host;
   proxy_set_header        X-Real-IP $remote_addr;
   proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_pass http://localhost:8080/test;
}
```

外面访问：http://romotehost/index/index.html
相当于访问：http://localhost:8080/testindex.html


proxy_pass后面的路径还有其他路径同时最后有 /：
```sh
location /index/
{
   proxy_redirect off;
   proxy_set_header        Host $host;
   proxy_set_header        X-Real-IP $remote_addr;
   proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;
   proxy_pass http://localhost:8080/test/;
}
```

外面访问：http://romotehost/index/index.html
相当于访问：http://localhost:8080/index/index.html
————————————————
版权声明：本文为CSDN博主「码农小非」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/king_way/article/details/94831420
