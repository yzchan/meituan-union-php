美团联盟PHP-SDK
-----

## About

美团联盟api接口SDK。

## 2022-04-14 美团优选接口更新

- 新增城市信息查询、商品类目查询接口
- 其他接口都是针对美团优选的参数调整

## 2021-10-25 美团联盟新版接口更新

[美团联盟接口更新通知](https://union.meituan.com/single/announcement/255)

## API Supports

- ✅ 订单列表查询
- ✅ 单订单列表查询
- ✅ 签名(sign)生成逻辑
- ✅ 订单回推签名验证
- ✅ 自助取链接口
- ✅ 小程序二维码生成
- ✅️ 商品列表搜索接口
- ✅️ 优选sid质量分&复购率查询
- ✅️ 城市信息查询(new)
- ✅️ 商品类目查询(new)

## Installation

```shell
composer require yzchan/meituan-union
```

## Quickstart

```php
require_once "vendor/autoload.php";

use MeituanUnion\Client;
use MeituanUnion\BusinessLine;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\OrderListRequest;

$client = new Client('<KEY>', '<SECRET>', '<CALLBACK_SECRET>');

// 订单列表查询
try {
    $request = new OrderListRequest();
    $request->setBusinessLine(BusinessLine::WAIMAI);
    $request->setActId(33);     // actId和businessLine至少有一个
    //$request->setStartTime(strtotime('2021-09-18'));
    //$request->setEndTime(strtotime('2021-09-19')); // 不能超过1天
    $request->setDate('2021-10-20');
    $request->setPage(1);
    $request->setLimit(20);
    $request->setQueryByPaytime();
    echo "\nrequest params: ";
    print_r($request->asArray());
    $response = $client->execute($request);
    echo "\nresponse: ";
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
```

## Links

- [美团联盟](https://union.meituan.com/)
- [美团联盟API接口](https://union.meituan.com/single/helpCenter?id=44)
- [美团联盟接口更新通知](https://union.meituan.com/single/announcement/255)
- [Guzzle](https://github.com/guzzle/guzzle)