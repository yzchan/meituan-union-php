<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\Client;
use MeituanUnion\BusinessLine;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\OrderListRequest;

$client = new Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $response = $client->request(OrderListRequest::PATH, [
        'actId' => 33,
        'businessLine' => BusinessLine::WAIMAI,    // actId和businessLine至少有一个
        'startTime' => strtotime('2021-10-20'),
        'endTime' => strtotime('2021-10-21'),   // 不能超过1天
        'page' => 1,
        'limit' => 10,
        'queryTimeType' => OrderListRequest::QUERY_BY_PAYTIME,
    ]);
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

// 格式化参数请求
try {
    $request = new OrderListRequest();
    $request->setBusinessLine(BusinessLine::WAIMAI);
    $request->setActId(33);
    $request->setDate('2021-10-20');
    //$request->setStartTime(strtotime('2021-09-18'));
    //$request->setEndTime(strtotime('2021-09-19')); // 不能超过1天
    $request->setPage(1);
    $request->setLimit(20);
    $request->setQueryByPaytime();
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
