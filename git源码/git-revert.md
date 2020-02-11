100047d commit包含两个commit ca4a7ff be8c6f6

git revert 100047d -m 1

参数 -m 就是指定要撤销的那个提价，从左往右，从1开始数；也就是我撤销的是ca4a7ff


##### 回滚多个提交

A -> B -> C -> D

想要回滚C提交和D提交

git revert B^..D 
