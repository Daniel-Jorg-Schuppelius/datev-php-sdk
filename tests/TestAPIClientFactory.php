<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TestAPIClientFactory.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use ConfigToolkit\ConfigLoader;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\API\Desktop\ClientBasicAuth;

class TestAPIClientFactory {
    private static ?ApiClientInterface $client = null;

    public static function getClient(): ApiClientInterface {
        if (self::$client === null) {
            $config = ConfigLoader::getInstance();
            $config->loadConfigFile(__DIR__ . "/../.samples/config.json");
            self::$client = new ClientBasicAuth($config->get("DATEV-DESKTOP-API", "user"), $config->get("DATEV-DESKTOP-API", "password"), $config->get("DATEV-DESKTOP-API", "resourceurl", "https://127.0.0.1:58452"), ConsoleLoggerFactory::getLogger());
        }
        return self::$client;
    }
}
