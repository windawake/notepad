如何给event事件传参数？使用闭包再封装一层方法即可

```php
<?php 

namespace App\Models\Traits;

use App\Fakers\UuidFaker;
use App\Models\ActionLog;
use Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * @var Illuminate\Database\Eloquent\Model ActionLogTrait 
 */
trait HasActionLog {

    public static function bootHasActionLog() {
        
        static::created(self::createActionLog('created'));

        static::updated(self::createActionLog('updated'));

        static::deleted(self::createActionLog('deleted'));
    }

    public static function createActionLog($action){
        $callback = function(Model $model) use ($action){
            //记录登录后用户的操作行为
            if(Auth::check()){
                $original = $model->getOriginal();
                $changes = $model->getChanges();
                $modelTable = $model->getTable();

                $inData = [
                    'user_type' => 1,
                    'user_id' => Auth()->id(),
                    'model_table' => $modelTable,
                    'model_id' => $model->getKey(),
                    'action' => $action,
                    'pre_content' => $original ? json_encode($original) : null,
                    'changes' => $changes ? json_encode($changes) : null,
                    'request_method' => request()->getMethod(),
                    'request_uri' => request()->getRequestUri(),
                    'created_ip' => request()->getClientIp(),
                    'batch_id' => UuidFaker::getBatchId(),
                ];
                
                ActionLog::create($inData);
            }
        };

        return $callback;
    }
}
```
