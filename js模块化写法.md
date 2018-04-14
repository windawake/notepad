```javascript
global.donkey = "hello monkey";

(function (global, factory) {
	factory();
}(this, (function () {
	console.log(this.donkey);
})));
```
