<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceDetectTest extends TestCase
{
    /**
     * A basic test for device detection
     *
     * @return void
     */
    public function testDetectDevice()
    {
        
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 5.0.2; SAMSUNG SM-T550 Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/3.3 Chrome/38.0.2125.102 Safari/537.36'
        ];
        
        $this->json('GET', '/device/detect', [], $headers)
//            ->dump()
             ->seeJson([
                 'isCellphone' => true,
             ]);
    }
}
