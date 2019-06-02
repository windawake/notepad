```
1994				php_request_shutdown((void *) 0);
(gdb) n
1996				requests++;
(gdb) p requests
$1 = 1
(gdb) n
1997				if (UNEXPECTED(max_requests && (requests == max_requests))) {
(gdb) p max_requests
$2 = 10
(gdb) info line
Line 1997 of "/web/php-7.2.0/sapi/fpm/fpm/fpm_main.c" starts at address 0x55c613c91390 <main+4403>
   and ends at 0x55c613c913ba <main+4445>.
```

奇怪，为什么max_requests=500不起作用估计文档已经说好了

```
; The number of requests each child process should execute before respawning.
; This can be useful to work around memory leaks in 3rd party libraries. For
; endless request processing specify '0'. Equivalent to PHP_FCGI_MAX_REQUESTS.
; Default Value: 0
pm.max_requests = 10
```
