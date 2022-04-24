<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\BusinessLine;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\GetQualityScoreBySidRequest;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 优选sid质量分&复购率查询
try {
    $request = new GetQualityScoreBySidRequest();
    $request->setBusinessLine(BusinessLine::YOUXUAN);
    $request->setSid(SID);
    $request->setType(2);
    $request->setPromotionType(1);
    $request->setDateBetween('2022-03-01', '2022-03-31'); // 日期间隔最长为90天
//    $request->setBeginDate('2022-01-01'); // 单独设置
//    $request->setEndDate('2022-01-04');
    $request->setPageNo(1);
    $request->setPageSize(100); // 页大小，默认20，1~100
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
