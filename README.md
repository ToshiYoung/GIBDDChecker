# GIBDDChecker
Usage:
```php
$checker = new Checker(['vin' => VIN_NUMBER]);
$data = $checker->history(); //История регистрации
$data = $checker->diagnostic();  //Информация о диагностической карте
$data = $checker->restricted(); //Информация о ДТП
$data = $checker->wanted(); //Информация о розыске
```
