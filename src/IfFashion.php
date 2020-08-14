<?php

namespace Seekx2y\IfFashionSDK;

use Hanson\Foundation\Foundation;

class IfFashion extends Foundation
{
    protected $providers = [
        ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }

    public function request(string $interfaceName, array $params)
    {
        return $this->api->request($interfaceName, $params);
    }
}