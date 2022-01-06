<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\BusinessLine;
use MeituanUnion\request\OrderRequest;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $response = $client->request(OrderRequest::PATH, [
        'orderId' => '81255900346769759',
        'businessLine' => BusinessLine::WAIMAI,
        'actId' => 33,          // actId和businessLine至少有一个
        'full' => 1,            // 是否返回完整订单信息
    ]);
    echo "\nbasic params request: \t";
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

// 格式化参数请求
try {
    $request = new OrderRequest();
    $request->setBusinessLine(BusinessLine::WAIMAI);
    $request->setActId(33);
    $request->setOrderId('81255900346769759');
    $request->setFull(0);
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
