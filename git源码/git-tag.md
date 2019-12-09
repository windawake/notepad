查看tag的最新提交commit

git rev-list -n 1 v1.2

把标签推到远程分支

git push --tags


在Git v1.7.0 之后，可以使用这种语法删除远程分支：

git push origin --delete <branchName>

删除tag这么用：

git push origin --delete tag <tagname>
