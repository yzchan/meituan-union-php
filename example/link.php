<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use \Meituan\Union\Link;
use \GuzzleHttp\Exception\GuzzleException;

$client = new Meituan\Union\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求推广链接
try {
    $link = $client->generateUrl([
        'actId' => ACTID,
        'sid' => SID,
        'linkType' => Link::H5,
    ]);
    echo "\nbasic params request: \t";
    print_r($link);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}

// 格式化参数请求小程序二维码
try {
    $link = $client->newLinkRequest()
        ->setH5Link()
        ->setSid(SID)
        ->setActId(ACTID)
        ->miniCode();
    echo "\nformat params request: \t";
    print_r($link);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}
