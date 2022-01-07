<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

$rawBody = file_get_contents('php://input');

$params = json_decode($rawBody, true);

if ($client->validateCallback($params)) {
    // 签名验证成功 do something...
} else {
    // 签名验证失败 do something...
}
