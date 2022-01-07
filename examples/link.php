<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\MiniCodeRequest;
use MeituanUnion\request\GenerateLinkRequest;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 自助取链
try {
    $request = new GenerateLinkRequest();
    $request->setSid(SID);
    $request->setActId(33);
    $request->setH5Link();
    $request->setShortLink(true);
    echo "自助取链demo:\nrequest params: ";
    print_r($request->asArray());
    $response = $client->execute($request);
    echo "\nresponse: ";
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}


// 获取小程序二维码
try {
    $request = new MiniCodeRequest();
    $request->setSid(SID);
    $request->setActId(ACTID);
    echo "小程序二维码demo:\nrequest params: ";
    print_r($request->asArray());
    $response = $client->execute($request);
    echo "\nresponse: ";
    print_r($response);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
