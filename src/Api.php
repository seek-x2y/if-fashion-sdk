<?php

namespace Seekx2y\IfFashionSDK;

use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    const DEV_URL = 'http://test2www.iffashion.cn';
    const PRODUCTION_URL = 'http://www.iffashion.cn';

    private $appId;
    private $appSecret;
    private $url;

    /**
     * Api constructor.
     * @param IfFashion $ifFashion
     */
    public function __construct(IfFashion $ifFashion)
    {
        $config = $ifFashion->getConfig();
        $this->appId = $config['app_id'] ?? '';
        $this->appSecret = $config['app_secret'] ?? '';
        $this->url = $config['debug'] ? static::DEV_URL : static::PRODUCTION_URL;
    }

    private function commonParams(array &$params)
    {
        $time = time();
        return array_merge($params, [
            'userid' => $this->appId,
            'timestamp' => $time,
            'sign' => md5($this->appId . $this->appSecret . $time)
        ]);
    }

    public function request(string $interfaceName, array $params)
    {

        $response = $this->getHttp()->post($this->url . $interfaceName, $this->commonParams($params));

        return json_decode((string)$response->getBody());
    }

    public function middlewares()
    {
        $this->http->addMiddleware($this->headerMiddleware([
            'Content-Type' => 'application/x-www-form-urlencoded',

        ]));
    }
}