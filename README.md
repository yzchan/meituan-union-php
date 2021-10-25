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
- ⚠️ [商品列表搜索接口（暂时只支持优选业务）](https://union.meituan.com/v2/apiDetail?id=21)

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
        ->setBusinessLine(\MeituanUnion\Order::WAIMAI)  // 业务线
        ->setActId(33)              // 活动id
        ->setDate('2021-10-20')     // 查询日期
//        ->setStartTime(strtotime('2021-09-18'))
//        ->setEndTime(strtotime('2021-09-19'))  // 注意最多只能查询一天的订单
        ->setPage(1)
        ->setLimit(20)
        ->setQueryByPaytime()
        ->list();
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