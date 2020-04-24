结果忽略列表加好了，操作却没有达到预期的效果，原因是：.gitignore只能忽略那些原来没有被track的文件，如果某些文件已经被纳入了版本管理中，则修改.gitignore是无效的；所以加好后，要对本地缓存进行处理，并且重新提交移除远方的git内容。git操作命令如下：

```
git rm -r --cached .
git add .
git commit -a -m"update .gitignore"
```
