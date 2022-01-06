<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use MeituanUnion\Link;
use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求推广链接
try {
    $link = $client->generateUrl([
        'actId' => 4,
        'sid' => SID,
        'linkType' => 1,
        'shortLink' => 1,
    ]);
    echo "\nbasic params request: \t";
    print_r($link);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
//
//// 格式化参数请求推广链接
//try {
//    $link = $client->newLinkRequest()
//        ->setH5Link()
//        ->setShortLink(true)
//        ->setSid(SID)
//        ->setActId(ACTID)
//        ->generateUrl();
//    echo "\nformat params request: \t";
//    print_r($link);
//} catch (GuzzleException $e) {
//    echo $e->getMessage();
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
//
//// 获取小程序二维码
//try {
//    $link = $client->newLinkRequest()
//        ->setSid(SID)
//        ->setActId(ACTID)
//        ->miniCode();
//    echo "\nformat params request: \t";
//    print_r($link);
//} catch (GuzzleException $e) {
//    echo $e->getMessage();
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
