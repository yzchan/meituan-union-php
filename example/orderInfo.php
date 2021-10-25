<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\Order;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $orders = $client->order([
        'orderId' => '81255900346769759',
        'businessLine' => Order::WAIMAI,
        'actId' => 33,          // actId和businessLine至少有一个
        'full' => 0,            // 是否返回完整订单信息
    ]);
    echo "\nbasic params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

// 格式化参数请求
try {
    $orders = $client->newOrderRequest()
        ->setBusinessLine(Order::WAIMAI)
        ->setActId(33)
        ->setOrderId('81255900346769759')
        ->setFull(true)
        ->info();
    echo "\nformat params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
