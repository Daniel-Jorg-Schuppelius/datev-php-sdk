<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OnlineEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Contracts;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use Datev\API\Online\OnlineService;
use ERRORToolkit\Traits\ErrorLog;
use PHPUnit\Framework\TestCase;
use Tests\Mocks\{MockClient, MockDataLoader};
use Tests\TestAPIClientFactory;

/**
 * Basisklasse für Tests der DATEV-Online-Endpoints.
 *
 * Läuft standardmäßig im Mock-Modus (Responses aus der OpenAPI-Spezifikation
 * des Dienstes); es gibt — anders als bei Desktop — keinen Echo-Endpoint zum
 * Verfügbarkeitstest. Live-Tests gegen die Sandbox nur mit DATEV_ONLINE_LIVE=1
 * und konfiguriertem Abschnitt DATEV-ONLINE-API in .samples/config.json.
 */
abstract class OnlineEndpointTest extends TestCase {
    use ErrorLog;

    protected ApiClientInterface $client;

    /**
     * Gibt an, ob der Test im Mock-Modus läuft.
     */
    protected bool $useMockClient = false;

    protected ?MockClient $mockClient = null;

    /**
     * Der Online-Dienst, dessen Endpoints getestet werden. Override in Subklassen.
     */
    abstract protected function getService(): OnlineService;

    /**
     * Prüft, ob API-Tests komplett übersprungen werden sollen.
     */
    protected static function shouldSkipApiTests(): bool {
        $envValue = $_ENV['DATEV_SKIP_API_TESTS'] ?? $_SERVER['DATEV_SKIP_API_TESTS'] ?? getenv('DATEV_SKIP_API_TESTS');
        return $envValue === '1' || $envValue === 'true';
    }

    /**
     * Prüft, ob Live-Tests gegen die Online-Sandbox aktiviert sind.
     */
    protected static function shouldRunLiveTests(): bool {
        $envValue = $_ENV['DATEV_ONLINE_LIVE'] ?? $_SERVER['DATEV_ONLINE_LIVE'] ?? getenv('DATEV_ONLINE_LIVE');
        return $envValue === '1' || $envValue === 'true';
    }

    protected function setUp(): void {
        parent::setUp();
        self::setLogger(TestAPIClientFactory::getLogger());

        if (self::shouldSkipApiTests()) {
            $this->markTestSkipped('API tests disabled via DATEV_SKIP_API_TESTS environment variable');
        }

        if (self::shouldRunLiveTests()) {
            $liveClient = TestAPIClientFactory::getOnlineClient($this->getService());
            if ($liveClient !== null) {
                $this->client = $liveClient;
                $this->useMockClient = false;
                return;
            }
            self::logDebug('DATEV_ONLINE_LIVE is set but DATEV-ONLINE-API config is missing, falling back to mock mode');
        }

        $this->enableMockMode();
    }

    /**
     * Aktiviert den Mock-Modus mit den OpenAPI-Responses des Dienstes.
     */
    protected function enableMockMode(): void {
        $this->useMockClient = true;
        $this->mockClient = MockDataLoader::createMockClientForOnlineService($this->getService());
        $this->client = $this->mockClient;
        self::logDebug("Mock mode enabled for online service: {$this->getService()->value}");
    }

    /**
     * Registriert zusätzliche Mock-Responses für spezifische Tests.
     * Nur im Mock-Modus aktiv - wird bei Live-Tests ignoriert.
     * @param array<string, mixed> $headers
     */
    protected function registerMockResponse(
        string $method,
        string $uri,
        int $statusCode = 200,
        mixed $body = null,
        array $headers = ['Content-Type' => 'application/json']
    ): void {
        if (!$this->useMockClient || $this->mockClient === null) {
            return;
        }
        $this->mockClient->registerMockResponse($method, $uri, $statusCode, $body, $headers);
    }

    /**
     * Prüft ob der Test im Mock-Modus läuft.
     */
    protected function isUsingMock(): bool {
        return $this->useMockClient;
    }

    /**
     * Überspringt den Test im Mock-Modus, wenn die Entity-Struktur zu komplex
     * für generische Mock-Daten ist.
     */
    protected function skipMockIfComplexEntity(string $reason = 'Entity structure too complex for generic mock data'): void {
        if ($this->useMockClient) {
            $this->markTestSkipped($reason);
        }
    }
}
