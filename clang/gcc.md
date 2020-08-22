编写最简单的汇编
```
.global main

.text
main:                      		# This is called by C library's startup code
	mov $message, %rdi          # First integer (or pointer) parameter in %rdi
	call puts                   # puts(message)
	ret                         # Return to C library code
message:
	.asciz "Hello, world"		# asciz puts a 0 byte at the end
```

然后在ubuntu系统运行
`gcc -no-pie -o hello hello.s`
