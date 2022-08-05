<?php

namespace MeituanUnion\Tests;

use MeituanUnion\BusinessLine;
use PHPUnit\Framework\TestCase;
use MeituanUnion\request\PoiRequest;
use MeituanUnion\request\CityRequest;

class TestRequestObject extends TestCase
{
    public function testCity()
    {
        $params = [
            'businessLine' => BusinessLine::YOUXUAN,
            'pageSize'     => 50,
            'pageNo'       => 1,
        ];
        $request = new CityRequest();
        $request->setBusinessLine($params['businessLine']);
        $request->setPageSize($params['pageSize']);
        $request->setPageNo($params['pageNo']);
        $requestParams = $request->asArray();
        foreach ($params as $key => $except) {
            $this->assertEquals($except, $requestParams[$key]);
        }
    }

    public function testPoi()
    {
        $params = [
            'businessLine'         => BusinessLine::WAIMAI,
            'sid'                  => '001',
            'longitude'            => 116466485,
            'latitude'             => 39995197,
            'categoryId'           => 20000000,
            'secondCategoryId'     => 20010000,
            'filterConditionCodes' => '71,72',
            'pageSize'             => 20,
            'pageNo'               => 1,
            'pageTraceId'          => 'xxx',
        ];
        $request = new PoiRequest();
        $request->setSid($params['sid']);
        $request->setCategoryId($params['categoryId']);
        $request->setSecondCategoryId($params['secondCategoryId']);
        $request->setLongitude($params['longitude']);
        $request->setLatitude($params['latitude']);
        $request->setFilterConditionCodes($params['filterConditionCodes']);
        $request->setPageSize($params['pageSize']);
        $request->setPageNo($params['pageNo']);
        $request->setPageTraceId($params['pageTraceId']);
        $requestParams = $request->asArray();
        foreach ($params as $key => $except) {
            $this->assertEquals($except, $requestParams[$key]);
        }
    }
}
