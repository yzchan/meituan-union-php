美团联盟PHP-SDK
-----

## About

美团联盟api接口封装。已同步更新至美团最新版本的接口。(2021-10-25)[美团联盟接口更新通知](https://union.meituan.com/single/announcement/255) 

## API Supports

- ✅ 订单列表查询（新）
- ✅ 单订单列表查询（新）
- ✅ 签名(sign)生成逻辑
- 🔜 订单回推接口
- ✅ 自助取链接口
- ✅ 小程序二维码生成
- ✅️ 商品列表搜索接口（暂时只支持优选业务）

## Installation

```shell
composer require yzchan/meituan-union
```

## Quickstart

```php
require_once "vendor/autoload.php";

use MeituanUnion\Order;
use MeituanUnion\Client;
use GuzzleHttp\Exception\GuzzleException;

$client = new Client('<KEY>', '<SECRET>', '<CALLBACK_SECRET>');

// 使用基础参数查询
try {
    $orders = $client->orderList([
        'actId' => 33,
        'businessLine' => Order::WAIMAI,    // actId和businessLine至少有一个
        'startTime' => strtotime('2021-10-20'),
        'endTime' => strtotime('2021-10-21'),   // 不能超过1天
        'page' => 1,
        'limit' => 10,
        'queryTimeType' => Order::QUERY_BY_PAYTIME,
    ]);
    echo "\nbasic params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

//  使用格式化参数查询
try {
    $orders = $client->newOrderRequest()
        ->setActId(33)              // 活动id
        ->setBusinessLine(Order::WAIMAI)  // 业务线
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
- [美团联盟接口更新通知](https://union.meituan.com/single/announcement/255)
- [Guzzle](https://github.com/guzzle/guzzle)