<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\BusinessLine;
use MeituanUnion\request\CityRequest;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 城市信息查询
try {
    $request = new CityRequest();
    $request->setBusinessLine(BusinessLine::YOUXUAN);
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
