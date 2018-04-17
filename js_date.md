js里面如何处理date日期

```javascript
dateFormat(date) {
  return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
},
dateAdd(interval, number, date) {
  switch (interval) {
    case "y":
      {
        date.setFullYear(date.getFullYear() + number);
        return date;
        break;
      }
    case "q":
      {
        date.setMonth(date.getMonth() + number * 3);
        return date;
        break;
      }
    case "m":
      {
        date.setMonth(date.getMonth() + number);
        return date;
        break;
      }
    case "w":
      {
        date.setDate(date.getDate() + number * 7);
        return date;
        break;
      }
    case "d":
      {
        date.setDate(date.getDate() + number);
        return date;
        break;
      }
    case "h":
      {
        date.setHours(date.getHours() + number);
        return date;
        break;
      }
    case "m":
      {
        date.setMinutes(date.getMinutes() + number);
        return date;
        break;
      }
    case "s":
      {
        date.setSeconds(date.getSeconds() + number);
        return date;
        break;
      }
    default:
      {
        date.setDate(date.getDate() + number);
        return date;
        break;
      }
  }
}
```

```javascript
var orderDay = new Date(2017,2,31);
var orderTime = orderDay.getTime()+86400000;
var expireDay = new Date(orderTime);
console.log(orderDay, orderTime);
console.log(expireDay.getFullYear(), expireDay.getMonth()+1, expireDay.getDate());
```
