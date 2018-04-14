```javascript
global.donkey = "hello monkey";

(function (global, factory) {
	factory();
}(this, (function () {
	console.log(this.donkey);
})));
```

```shell
输出 hello monkey
```

相当于`factory = (function () {console.log(this.donkey);})`，然后factory()去执行
