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

use APIToolkit\API\Authentication\BasicAuthentication;
use APIToolkit\API\Authentication\BearerAuthentication;
use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use ConfigToolkit\ConfigLoader;
use Datev\API\Desktop\Client;
use ERRORToolkit\Enums\LogType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use ERRORToolkit\Factories\FileLoggerFactory;
use ERRORToolkit\LoggerRegistry;
use Psr\Log\LoggerInterface;

class TestAPIClientFactory {
    private static ?ApiClientInterface $client = null;
    private static ?LoggerInterface $logger = null;

    /**
     * Erstellt oder gibt den Logger zurück.
     * Unterstützt Console- und FileLogger basierend auf Umgebungsvariable.
     */
    public static function getLogger(): LoggerInterface {
        if (self::$logger === null) {
            $logType = getenv('DATEV_LOG_TYPE') ?: LogType::CONSOLE->value;

            self::$logger = match ($logType) {
                LogType::FILE->value => FileLoggerFactory::getLogger(
                    getenv('DATEV_LOG_FILE') ?: sys_get_temp_dir() . '/datev-sdk.log'
                ),
                default => ConsoleLoggerFactory::getLogger(),
            };

            LoggerRegistry::setLogger(self::$logger);
        }
        return self::$logger;
    }

    public static function getClient(): ApiClientInterface {
        if (self::$client === null) {
            $logger = self::getLogger();
            $config = ConfigLoader::getInstance($logger);
            $config->loadConfigFile(__DIR__ . "/../.samples/config.json");

            $authType = $config->get("DATEV-DESKTOP-API", "auth_type", "basic");
            $baseUrl = $config->get("DATEV-DESKTOP-API", "resourceurl", "https://127.0.0.1:58452");
            $verifySSL = $config->get("DATEV-DESKTOP-API", "verify_ssl", false);

            if ($authType === "bearer") {
                $authentication = new BearerAuthentication(
                    $config->get("DATEV-DESKTOP-API", "api_key") ?? "test-api-key",
                    ['X-Datev-Client-ID' => $config->get("DATEV-DESKTOP-API", "client_id") ?? "test-client-id"]
                );
                self::$client = new Client($authentication, $baseUrl, $logger, false, $verifySSL);
            } else {
                $authentication = new BasicAuthentication(
                    $config->get("DATEV-DESKTOP-API", "user") ?? "test-user",
                    $config->get("DATEV-DESKTOP-API", "password") ?? "test-password"
                );
                self::$client = new Client($authentication, $baseUrl, $logger, false, $verifySSL);
            }
        }
        return self::$client;
    }

    /**
     * Setzt den Client zurück für frische Konfiguration.
     */
    public static function reset(): void {
        self::$client = null;
        self::$logger = null;
        LoggerRegistry::resetLogger();
    }
}
