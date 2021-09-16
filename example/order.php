<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use Meituan\Union\Order;
use GuzzleHttp\Exception\GuzzleException;

$client = new Meituan\Union\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $orders = $client->orderList([
        'startTime' => strtotime('2021-09-12'),
        'endTime' => strtotime('2021-09-13'),
        'queryTimeType' => Meituan\Union\Order::QUERY_BY_PAYTIME,
        'page' => 1,
        'limit' => 10,
        'type' => Order::TAKEOUT,
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
        ->setStartTime('2021-09-12')
        ->setEndTime('2021-09-13')
        ->setPage(1)
        ->setLimit(20)
        ->setQueryByPaytime()
        //->setQueryByModtime()
        ->query();
    echo "\nformat params request: \t";
    print_r($orders);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
