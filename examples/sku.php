<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\BusinessLine;
use MeituanUnion\request\SkuQueryRequest;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 商品列表搜索接口
try {
    $request = new SkuQueryRequest();
    $request->setBusinessLine(BusinessLine::YOUXUAN);
    $request->setActId(105);
//    $request->setCityId(1);
//    $request->setCategoryId(240422);
    $request->setPageSize(50);
    $request->setPageNo(1);
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
