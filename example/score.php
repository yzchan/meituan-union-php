<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\BusinessLine;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\GetQualityScoreBySidRequest;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

try {
    $request = new GetQualityScoreBySidRequest();
    $request->setBusinessLine(BusinessLine::YOUXUAN);
    $request->setSid(SID);
    $request->setType(1);
    $request->setBeginDate('2022-01-01');
    $request->setEndDate('2022-01-04');
    $request->setPageNo(1);
    $request->setPageSize(100);
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
