<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Seekx2y\IfFashionSDK\IfFashion;

class DeliveryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDevEnv()
    {
        $config = [
            'app_id' => '',
            'app_secret' => '',
            'debug' => true,
        ];

        $api = new IfFashion($config);
        $res = $api->request('/api/shopExport/shipments', [
            'origin_no' => '1232321',
            'logistic_name' => 'EMS',
            'logistic_code' => '214312342',
        ]);

    print_r($res);
        $this->assertObjectHasAttribute('success', $res);
        $this->assertEquals(1, $res->success);
    }
}