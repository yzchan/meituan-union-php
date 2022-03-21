<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\request\SkuQueryRequest;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 由于技术功能升级，美团联盟优选业务【商品列表搜索接口(新版)】API接口将于2022年1月17日暂停数据访问，具体恢复时间另行通知。
try {
    $request = new SkuQueryRequest();
    $request->setBusinessType(6);   // 还是旧的业务线类型
    $request->setSid(SID);
    $request->setPageSize(50);  // 该参数无法生效，返回固定为20
    $request->setPageNO(1);
    $request->setLatitude('31.8240613040921');
    $request->setLongitude('119.99997094482418');
    $request->setDeviceType('');
    $request->setDeviceId('');
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
