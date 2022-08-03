<?php

namespace MeituanUnion\Tests;

use MeituanUnion\Client;
use PHPUnit\Framework\TestCase;

class TestClient extends TestCase
{
    public function testOrderListRequestParams()
    {
        $client = new Client('mock-key', 'mock-secret', 'mock-callback-secret');
        $this->assertInstanceOf(Client::class, $client);
        $response = $client->city([
            'businessLine' => 4,
            'pageSize'     => 10,
            'pageNo'       => 1,
        ]);
        $this->assertArrayHasKey('data', $response);
    }
}
