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

use APIToolkit\Contracts\Abstracts\API\Authentication\BasicAuthentication;
use APIToolkit\Contracts\Abstracts\API\Authentication\BearerAuthentication;
use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use ConfigToolkit\ConfigLoader;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\API\Desktop\Client;

class TestAPIClientFactory {
    private static ?ApiClientInterface $client = null;

    public static function getClient(): ApiClientInterface {
        if (self::$client === null) {
            $config = ConfigLoader::getInstance(ConsoleLoggerFactory::getLogger());
            $config->loadConfigFile(__DIR__ . "/../.samples/config.json");

            $authType = $config->get("DATEV-DESKTOP-API", "auth_type", "basic");
            $baseUrl = $config->get("DATEV-DESKTOP-API", "resourceurl", "https://127.0.0.1:58452");

            if ($authType === "bearer") {
                $authentication = new BearerAuthentication(
                    $config->get("DATEV-DESKTOP-API", "api_key") ?? "test-api-key",
                    ['X-Datev-Client-ID' => $config->get("DATEV-DESKTOP-API", "client_id") ?? "test-client-id"]
                );
                self::$client = new Client($authentication, $baseUrl, ConsoleLoggerFactory::getLogger());
            } else {
                $authentication = new BasicAuthentication(
                    $config->get("DATEV-DESKTOP-API", "user") ?? "test-user",
                    $config->get("DATEV-DESKTOP-API", "password") ?? "test-password"
                );
                self::$client = new Client($authentication, $baseUrl, ConsoleLoggerFactory::getLogger());
            }
        }
        return self::$client;
    }
}
