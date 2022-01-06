<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\request\SkuQuery;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

try {
    $request = new SkuQuery();
    $request->setBusinessType(6);
    $request->setSid(SID);
    $request->setPageSize(50);  // 该参数暂时无法生效，返回固定为20
    $request->setPageNO(1);
    $request->setLatitude('31.8240613040921'); // 武汉某地址
    $request->setLongitude('119.99997094482418');
    $request->setDeviceType('');
    $request->setDeviceId('');
    echo "\nrequest params: ";
    print_r((array)$request);
    $response = $client->execute($request);
    echo "\nresponse: ";
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
