### 模拟php的array_diff

```javascript
import _ from 'lodash';
let arrA = [
  {
    goodsId: 1,
    proId: 1,
    name:'one',
  },
  {
    goodsId: 1,
    proId: 2,
    name: 'two',
  },
  {
    goodsId: 2,
    proId: 2,
    name: 'three',
  },
];

let arrB = [
  {
    goodsId: 1,
    proId: 1,
    author:'donkey'
  },
]

console.log(_.differenceBy(arrA, arrB, 'goodsId','proId'));
```
