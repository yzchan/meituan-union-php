美团联盟PHP-SDK
-----

## About

美团联盟api接口封装

## API Supports

- ✅ [订单列表查询（新）](https://union.meituan.com/v2/apiDetail?id=1)
- ✅ [签名(sign)生成逻辑](https://union.meituan.com/v2/apiDetail?id=2)
- 🔜 [订单回推接口](https://union.meituan.com/v2/apiDetail?id=6)
- ✅ [自助取链接口](https://union.meituan.com/v2/apiDetail?id=8)
- ✅ [小程序二维码生成](https://union.meituan.com/v2/apiDetail?id=12)
- ⚠️ [商品列表搜索接口（暂时只支持优选业务）](https://union.meituan.com/v2/apiDetail?id=21) 官方文档有问题，暂时无法查询

## Installation

```shell
composer require yzchan/meituan-union
```

## Quickstart

```php
require_once "vendor/autoload.php";

use \GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client('<KEY>', '<SECRET>', '<CALLBACK_SECRET>');

try {
    $orders = $client->newOrderRequest()
        ->setStartTime('2021-09-12')
        ->setEndTime('2021-09-13')
        ->setPage(1)
        ->setLimit(20)
        ->setQueryByPaytime()
        ->query();
    echo "\nformat params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## Links

- [美团联盟](https://union.meituan.com/)
- [Guzzle](https://github.com/guzzle/guzzle)