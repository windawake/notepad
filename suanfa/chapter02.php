```php

// 题目：有30个人，其中有男人，女人和小孩，这些人在一家饭店吃饭花了50元；每个男人花3元，每个女人花2元，每个小孩花1元；问男人，女人和小孩各有多少人？
// $x = 0;
// $y = 0;
// $z = 0;
// $count = 0;

// for($x=1; $x<=9; $x++)
// {
//   $y = 20 -2*$x;
//   $z = 30 - $x - $y;
//   if(3*$x + 2*$y + $z == 50){
//     var_dump("x=$x, y=$y z=$z");
//   }
// }

// 题目：爱因斯坦的阶梯
// $n = 7;
// while(!( ($n%2==1)&&($n%3==2)&&($n%5==4)&&($n%6==5)&&($n%7==0) )){
//   $n = $n + 7;
// }
// var_dump($n);

// 题目：素数
// function prime($i)
// {
//   $j = 0;
//   if($i <= 1) return 0;
//   if($i == 2) return 1;
//   for($j=2; $j<= sqrt($i); $j++){
//     if(!($i%$j)) return 0;
//   }
//   return 1;
// }

// var_dump(prime(10));

//题目：加勒比海盗
// $arrAntique = [4, 10, 7, 11, 3, 5, 14, 2];
// sort($arrAntique);
// $capacity = 30;
// $load = 0;

// foreach($arrAntique as $val)
// {
//   if($load+$val < 30){
//     $load = $load + $val;
//   }else{
//     break;
//   }
// }

// var_dump($load);

//题目：阿里巴巴与四十大盗--背包问题
$arrTreasure = [
  ['weight'=>4, 'value'=>3],
  ['weight'=>2, 'value'=>8],
  ['weight'=>9, 'value'=>18],
  ['weight'=>5, 'value'=>6],
  ['weight'=>5, 'value'=>8],
  ['weight'=>8, 'value'=>20],
  ['weight'=>5, 'value'=>5],
  ['weight'=>4, 'value'=>6],
  ['weight'=>5, 'value'=>7],
  ['weight'=>5, 'value'=>15]
];

foreach($arrTreasure as $key => $treasure){
  $treasure['per'] = $treasure['value']/$treasure['weight'];
  $arrTreasure[$key] = $treasure;
}

usort($arrTreasure, function($a, $b){
  if($a['per'] < $b['per']){
    return 1;
  }else{
    return -1;
  }
});

var_dump($arrTreasure);

```

