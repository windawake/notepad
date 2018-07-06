```php
// function fib($num)
// {
//   if($num < 1){
//     return  -1;
//   }
//   if($num == 1 || $num ==2){
//     return 1;
//   }
//   return fib($num -1)+fib($num -2);
// }

// function fib($num)
// {
//   if($num < 1){
//     return -1;
//   }
//   $arr = [];
//   $arr[1] = 1;
//   $arr[2] = 1;
//   for ($i=3; $i<=$num; $i++)
//   {
//     $arr[$i] = $arr[$i-1]+$arr[$i-2];
//   }
//   return $arr[$num];
// }

function fib($num)
{
  if($num < 1){
    return -1;
  }
  $s1 = 1;
  $s2 = 1;
  $shortNum = $num / 2;

  for($i=2; $i<=$shortNum; $i++)
  {
    $s1 = $s1 + $s2;
    $s2 = $s2 + $s1;
  }
  return $s2;
}

$sTime = microtime(true);
$res = fib(6);
$eTime = microtime(true);

var_dump($res, $eTime - $sTime);
```
