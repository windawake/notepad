```javascript
let url = "http://php.app/post.php";

// raw
// axios.post(url, {
//   firstName: 'Moon',
//   lastName: 'Stone'
// }).then((response) => {
//   console.log(response);
// })

// form-data
// var fd = new FormData()
// fd.append('computer', 'white');

// let config = {
//   headers: {
//     'Content-Type': 'multipart/form-data'
//   }
// }
// axios.post(url, fd, config).then((response) => {
//   console.log(response);
// })

// x-www-form-urlencoded
var qs = require('qs');
axios.post(url, qs.stringify({ 'bar': 123 })).then((response) => {
  console.log(response);
})
```
