<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $link = $client->skuQuery([
        'businessType' => '6', // 优选固定为6
        'sid' => SID,
        'pageSize' => 50,
        'pageNO' => 1,
        'longitude' => '119.99997094482418', // 武汉
        'latitude' => '31.8240613040921',
//        'deviceType' => '',
//        'deviceId' => '',
    ]);
    echo "\nbasic params request: \t";
    print_r($link);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}