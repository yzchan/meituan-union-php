<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\Client;
use MeituanUnion\BusinessLine;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\OrderListRequest;

$client = new Client(KEY, SECRET, CALLBACK_SECRET);

// 订单列表查询
try {
    $request = new OrderListRequest();
    $request->setBusinessLine(BusinessLine::WAIMAI);
    $request->setActId(33); // actId和businessLine至少有一个
    $startTime = strtotime('2021-11-18');
    $endTime = strtotime('2021-11-19'); // 不能超过1天
    $request->setTimeBetween($startTime, $endTime); // 设置查询时间区间
//    $request->setStartTime($startTime); // 或者单独指定开始、结束时间
//    $request->setEndTime($endTime);
//    $request->setDate('2021-10-20');  // 也可以指定某一天也查询
    $request->setPage(1);
    $request->setLimit(1);
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
