```php
function _error_handler($errno, $errstr, $errfile, $errline)
{
  echo "错误编号errno: $errno<br/>";
  echo "错误信息errstr: $errstr<br/>";
  echo "错误文件errfile: $errfile<br/>";
  echo "错误行号errline: $errline<br/><br/>";
}

set_error_handler('_error_handler', E_ALL | E_STRICT);

function _exception_handler(Throwable $e)
{
  if($e instanceof Error)
  {
    echo "catch Error: " . $e->getCode() . '   ' . $e->getMessage() . '<br>';
  }else{
    echo "catch Exception: " . $e->getCode() . '   ' . $e->getMessage() . '<br>';
  }
}

set_exception_handler('_exception_handler');

// echo $foo['bar'];
trigger_error("人为触发一个错误", E_USER_ERROR);

// throw new Exception('抛出异常错误', 400);
// foobar(3, 5);
// $conn = new PDO("mysql:host=127.0.0.1;dbname=golang", 'root', '123456');



// try{
//   echo $foo['bar'];
//   trigger_error("人为触发一个错误", E_USER_ERROR);

//   // throw new Exception('抛出异常错误', 400);
//   foobar(3, 5);
//   // $conn = new PDO("mysql:host=127.0.0.1;dbname=golang", 'root', '123456');

// }catch(Throwable $e)
// {
//   echo "Error code: {$e->getCode()}<br/>";
//   echo "Error message: {$e->getMessage()}<br/>";
//   echo "Error file: {$e->getFile()}<br/>";
//   echo "Error fileline: {$e->getLine()}<br/><br/>";
// }
```
