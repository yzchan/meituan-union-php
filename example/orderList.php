<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\Order;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $orders = $client->orderList([
        'startTime' => strtotime('2021-10-20'),
        'endTime' => strtotime('2021-10-21'),   // 不能超过1天
        'queryTimeType' => MeituanUnion\Order::QUERY_BY_PAYTIME,
        'page' => 1,
        'limit' => 10,
        'actId' => 33,          // actId和businessLine至少有一个
        'businessLine' => Order::WAIMAI,
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
        ->setDate('2021-10-20')
        //->setStartTime(strtotime('2021-09-18'))
        //->setEndTime(strtotime('2021-09-19')) // 不能超过1天
        ->setPage(1)
        ->setLimit(20)
        ->setQueryByPaytime()
        //->setQueryByModtime()
        ->list();
    echo "\nformat params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
