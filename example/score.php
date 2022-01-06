<?php
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . "/../vendor/autoload.php";

use GuzzleHttp\Exception\GuzzleException;

$client = new MeituanUnion\Client(KEY, SECRET, CALLBACK_SECRET);

// 基础参数请求
try {
    $link = $client->qualityScore([
        'businessLine' => 4, // 业务线（默认为:4表示优选）
        'pageSize' => 20, // 页大小，默认20，1~100
        'pageNo' => 1, // 第几页，默认：１
        'sid' => SID,
        'type' => 1, // 质量分类型（1表示预估类型、2表示实际类型）
        'beginDate' => '2021-12-07', // 查询起始日期格式如：yyyy-mm-dd（注：起始时间应晚于三个月前）
        'endDate' => '2022-01-07', // 查询截止日期格式如：yyyy-mm-dd（注：日期间隔最长为90天）
    ]);
    echo "\nbasic params request: \t";
    print_r($link);
} catch (GuzzleException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}