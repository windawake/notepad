生成batchId是采用laravel内置的方法

$batchId = Str::orderedUuid()->toString();
