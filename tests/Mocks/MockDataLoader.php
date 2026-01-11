<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MockDataLoader.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

use Tests\Mocks\Fixtures\AccountingFixtures;
use Tests\Mocks\Fixtures\ClientMasterDataFixtures;
use Tests\Mocks\Fixtures\DiagnosticsFixtures;
use Tests\Mocks\Fixtures\PayrollFixtures;

/**
 * Lädt Mock-Daten aus Fixtures, JSON-Dateien und OpenAPI-Spezifikationen.
 */
class MockDataLoader {
    private const FIXTURES_PATH = __DIR__ . '/data';

    /**
     * Ob OpenAPI-Daten bevorzugt werden sollen.
     */
    private static bool $preferOpenApi = true;

    /**
     * Aktiviert/deaktiviert die Bevorzugung von OpenAPI-Daten.
     */
    public static function setPreferOpenApi(bool $prefer): void {
        self::$preferOpenApi = $prefer;
    }

    /**
     * Registriert alle Standard-Fixtures auf dem MockClient.
     * Nutzt OpenAPI-Daten wenn verfügbar, sonst statische Fixtures.
     */
    public static function registerAllFixtures(MockClient $client): MockClient {
        if (self::$preferOpenApi) {
            // Versuche OpenAPI-Daten zu laden
            OpenApiMockGenerator::registerAllFromOpenApi($client);
        }

        // Statische Fixtures als Fallback/Ergänzung
        $client->registerMockResponses(DiagnosticsFixtures::getAllResponses());
        $client->registerMockResponses(AccountingFixtures::getAllResponses());
        $client->registerMockResponses(ClientMasterDataFixtures::getAllResponses());
        $client->registerMockResponses(PayrollFixtures::getAllResponses());

        return $client;
    }

    /**
     * Registriert nur Diagnostics-Fixtures (für Echo-Tests).
     */
    public static function registerDiagnosticsFixtures(MockClient $client): MockClient {
        if (self::$preferOpenApi) {
            OpenApiMockGenerator::registerFromOpenApi($client, 'diagnostics');
        }
        return $client->registerMockResponses(DiagnosticsFixtures::getAllResponses());
    }

    /**
     * Registriert nur Accounting-Fixtures.
     */
    public static function registerAccountingFixtures(MockClient $client): MockClient {
        if (self::$preferOpenApi) {
            OpenApiMockGenerator::registerFromOpenApi($client, 'accounting');
        }
        return $client->registerMockResponses(AccountingFixtures::getAllResponses());
    }

    /**
     * Registriert nur ClientMasterData-Fixtures.
     */
    public static function registerClientMasterDataFixtures(MockClient $client): MockClient {
        if (self::$preferOpenApi) {
            OpenApiMockGenerator::registerFromOpenApi($client, 'clientmasterdata');
        }
        return $client->registerMockResponses(ClientMasterDataFixtures::getAllResponses());
    }

    /**
     * Registriert nur Payroll-Fixtures.
     */
    public static function registerPayrollFixtures(MockClient $client): MockClient {
        if (self::$preferOpenApi) {
            OpenApiMockGenerator::registerFromOpenApi($client, 'payroll');
        }
        return $client->registerMockResponses(PayrollFixtures::getAllResponses());
    }

    /**
     * Lädt Mock-Daten aus einer JSON-Datei.
     *
     * @param string $filename Dateiname relativ zum data-Verzeichnis
     * @return array<string, mixed>|null
     */
    public static function loadFromJsonFile(string $filename): ?array {
        $filePath = self::FIXTURES_PATH . '/' . $filename;

        if (!file_exists($filePath)) {
            return null;
        }

        $content = file_get_contents($filePath);
        if ($content === false) {
            return null;
        }

        $data = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $data;
    }

    /**
     * Lädt alle JSON-Dateien aus dem data-Verzeichnis und registriert sie.
     */
    public static function registerFromJsonFiles(MockClient $client): MockClient {
        if (!is_dir(self::FIXTURES_PATH)) {
            return $client;
        }

        $files = glob(self::FIXTURES_PATH . '/*.json');
        if ($files === false) {
            return $client;
        }

        foreach ($files as $file) {
            $client->loadMockDataFromFile($file);
        }

        return $client;
    }

    /**
     * Erstellt einen vollständig konfigurierten MockClient mit allen Fixtures.
     */
    public static function createFullyConfiguredMockClient(): MockClient {
        $client = new MockClient();
        self::registerAllFixtures($client);
        self::registerFromJsonFiles($client);
        return $client;
    }

    /**
     * Erstellt einen MockClient nur für einen bestimmten Domain-Bereich.
     *
     * @param string $domain 'diagnostics', 'accounting', 'clientmasterdata', 'payroll'
     */
    public static function createMockClientForDomain(string $domain): MockClient {
        $client = new MockClient();

        // Immer Diagnostics laden für Echo-Test
        self::registerDiagnosticsFixtures($client);

        switch (strtolower($domain)) {
            case 'accounting':
                self::registerAccountingFixtures($client);
                break;
            case 'clientmasterdata':
            case 'client-master-data':
            case 'masterdata':
            case 'master-data':
                self::registerClientMasterDataFixtures($client);
                break;
            case 'payroll':
            case 'hr':
                self::registerPayrollFixtures($client);
                break;
            case 'law':
                if (self::$preferOpenApi) {
                    OpenApiMockGenerator::registerFromOpenApi($client, 'law');
                }
                break;
            case 'ordermanagement':
            case 'order-management':
                if (self::$preferOpenApi) {
                    OpenApiMockGenerator::registerFromOpenApi($client, 'ordermanagement');
                }
                break;
            case 'dms':
            case 'documentmanagement':
            case 'document-management':
                if (self::$preferOpenApi) {
                    OpenApiMockGenerator::registerFromOpenApi($client, 'dms');
                }
                break;
            case 'iam':
            case 'identityandaccessmanagement':
                if (self::$preferOpenApi) {
                    OpenApiMockGenerator::registerFromOpenApi($client, 'iam');
                }
                break;
            case 'publicsector':
            case 'public-sector':
                if (self::$preferOpenApi) {
                    OpenApiMockGenerator::registerFromOpenApi($client, 'publicsector');
                }
                break;
        }

        return $client;
    }

    /**
     * Erstellt einen MockClient nur mit OpenAPI-Daten (ohne statische Fixtures).
     */
    public static function createOpenApiMockClient(string $domain = null): MockClient {
        return OpenApiMockGenerator::createMockClientFromOpenApi($domain);
    }
}
