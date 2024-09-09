<?php

namespace Tests;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use Datev\API\Desktop\ClientBasicAuth;
use Tests\Config\Config;

class TestAPIClientFactory {
    private static ?ApiClientInterface $client = null;

    public static function getClient(): ApiClientInterface {
        if (self::$client === null) {
            $config = new Config();
            self::$client = new ClientBasicAuth($config->user, $config->password, $config->resourceUrl);
        }
        return self::$client;
    }
}
