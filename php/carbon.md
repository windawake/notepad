```php

$dto = new \DateTime();
$timezone = new \DateTimeZone("+10:00");
$dto->setTimezone($timezone);

dd($dto->getTimestamp(), $dto->format('Y-m-d H:i:s'), intval($dto->format('Uu') /pow(10, 3)) );
        
```
