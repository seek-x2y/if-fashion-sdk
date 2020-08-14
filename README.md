# IfFashion SDK

If 种草机SDK 

base on [foundation-sdk](https://github.com/HanSon/foundation-sdk)

## Requirement

- PHP >= 7.1
- **[composer](https://getcomposer.org/)**

## Installation

```
composer require seek-x2y/if-fashion-sdk -vvv
```

## Usage


```php
<?php

$api = new \Seekx2y\IfFashionSDK\IfFashion([
     'app_id' => '',
     'app_secret' => '',
     'debug' => true,
    'log' => [
        'name' => 'if-fashion',
        'file' => __DIR__.'/if-fashion.log',
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);

$result = $api->request('/api/shopExport/shipments', [
     'origin_no' => '',
     'logistic_name' => '',
     'logistic_code' => '',
 ]);;
```

## License

MIT