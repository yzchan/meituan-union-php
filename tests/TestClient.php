<?php

namespace MeituanUnion\Tests;

use MeituanUnion\Client;
use PHPUnit\Framework\TestCase;

class TestClient extends TestCase
{
    private $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client('mock-key', 'mock-secret', 'mock-callback-secret');
    }

    public function testCallWithoutRequestObject()
    {
        $this->assertInstanceOf(Client::class, $this->client);
        $this->assertTrue(is_callable([$this->client, 'order']));
        $this->assertTrue(is_callable([$this->client, 'orderList']));
        $this->assertTrue(is_callable([$this->client, 'miniCode']));
        $this->assertTrue(is_callable([$this->client, 'generateUrl']));
        $this->assertTrue(is_callable([$this->client, 'sku']));
        $this->assertTrue(is_callable([$this->client, 'getQualityScoreBySid']));
        $this->assertTrue(is_callable([$this->client, 'category']));
        $this->assertTrue(is_callable([$this->client, 'city']));
        $this->assertTrue(is_callable([$this->client, 'poi']));
    }

    public function testCityRequest()
    {
        $response = $this->client->city([
            'businessLine' => 4,
            'pageSize'     => 10,
            'pageNo'       => 1,
        ]);
        $this->assertArrayHasKey('data', $response);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
