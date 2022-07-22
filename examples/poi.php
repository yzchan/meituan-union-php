<?php

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\request\PoiRequest;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 门店POI查询
try {
    $request = new PoiRequest();
    $request->setSid('001');
    $request->setCategoryId(20000000);
    $request->setSecondCategoryId(20010000);
    $request->setLongitude(116466485);
    $request->setLatitude(39995197);
    $request->setFilterConditionCodes('71,72');
    $request->setPageSize(20);
    $request->setPageNo(1);
    $request->setPageTraceId('');
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
