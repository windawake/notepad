### es6非引用地复制一个数组或者对象的方法

```javascript
// 数组复制
var arr1=[1,2,3];
var arr2=Array.from(arr1);
arr1.push(4);
console.log(arr1);  //1234
console.log(arr2);  //123
```
```javascript
const scheme = {goodsId: 1};
const bindScheme = Object.assign({}, scheme);
bindScheme.goodsName = 'hello';

console.log(scheme);  //{ goodsId: 1 }
console.log(bindScheme); //{ goodsId: 1, goodsName: 'hello' }
````
