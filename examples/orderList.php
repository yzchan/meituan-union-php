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
    $startTime = strtotime('2022-04-04 00:00:00');
    $endTime   = strtotime('2022-04-05 00:00:00'); // 不能超过1天
    // $request->setStartTime($startTime); // 指定开始时间
    // $request->setEndTime($endTime); // 指定结束时间
    $request->setTimeBetween($startTime, $endTime); // 指定时间区间
    // $request->setDate('2022-04-04');  // 指定日期
    $request->setPage(1);
    $request->setLimit(1);
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
