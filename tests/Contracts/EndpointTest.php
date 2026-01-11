<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Contracts;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use Datev\API\Desktop\Endpoints\Diagnostics\EchoEndpoint;
use ERRORToolkit\Traits\ErrorLog;
use PHPUnit\Framework\TestCase;
use Tests\Mocks\MockClient;
use Tests\Mocks\MockDataLoader;
use Tests\TestAPIClientFactory;
use Throwable;

abstract class EndpointTest extends TestCase {
    use ErrorLog;

    protected ?ApiClientInterface $client;

    protected bool $apiDisabled = false;

    /**
     * Gibt an, ob der Test im Mock-Modus läuft.
     * Wenn true, werden Mock-Daten statt echter API-Antworten verwendet.
     */
    protected bool $useMockClient = false;

    /**
     * Der MockClient für Offline-Tests.
     */
    protected ?MockClient $mockClient = null;

    /**
     * Die Domain für Mock-Daten. Override in Subklassen.
     * Mögliche Werte: 'diagnostics', 'accounting', 'clientmasterdata', 'payroll', 'hr'
     */
    protected string $mockDomain = 'diagnostics';

    /**
     * Prüft, ob API-Tests komplett übersprungen werden sollen.
     * Setze DATEV_SKIP_API_TESTS=1 um alle API-Endpoint-Tests zu überspringen.
     */
    protected static function shouldSkipApiTests(): bool {
        $envValue = $_ENV['DATEV_SKIP_API_TESTS'] ?? $_SERVER['DATEV_SKIP_API_TESTS'] ?? getenv('DATEV_SKIP_API_TESTS');
        return $envValue === '1' || $envValue === 'true';
    }

    /**
     * Prüft, ob der Mock-Modus erzwungen werden soll (ohne API-Verbindungsversuch).
     * Setze DATEV_FORCE_MOCK=1 um direkt in den Mock-Modus zu wechseln.
     */
    protected static function shouldForceMockMode(): bool {
        $envValue = $_ENV['DATEV_FORCE_MOCK'] ?? $_SERVER['DATEV_FORCE_MOCK'] ?? getenv('DATEV_FORCE_MOCK');
        return $envValue === '1' || $envValue === 'true';
    }

    public function __construct($name) {
        parent::__construct($name);
        self::setLogger(TestAPIClientFactory::getLogger());
        $this->client = TestAPIClientFactory::getClient();
    }

    final protected function setUp(): void {
        // Wenn DATEV_SKIP_API_TESTS gesetzt ist, alle Endpoint-Tests überspringen
        if (self::shouldSkipApiTests()) {
            $this->markTestSkipped('API tests disabled via DATEV_SKIP_API_TESTS environment variable');
        }

        // Wenn DATEV_FORCE_MOCK gesetzt ist, direkt in Mock-Modus wechseln (ohne API-Versuch)
        if (self::shouldForceMockMode()) {
            $this->apiDisabled = true;
            if (!$this->useMockClient) {
                $this->enableMockMode();
            }
            return;
        }

        if (!$this->apiDisabled) {
            try {
                $endpoint = new EchoEndpoint($this->client);
                $echoResponse = $endpoint->get();
                $this->apiDisabled = !$echoResponse->isValid();
            } catch (Throwable $e) {
                self::logDebug("API not available, switching to mock mode: " . $e->getMessage());
                $this->apiDisabled = true;
            }
        }

        // Wenn API deaktiviert ist, auf MockClient umschalten
        if ($this->apiDisabled && !$this->useMockClient) {
            $this->enableMockMode();
        }
    }

    /**
     * Aktiviert den Mock-Modus und ersetzt den echten Client durch einen MockClient.
     * Wird nur aufgerufen, wenn die API nicht verfügbar ist.
     */
    protected function enableMockMode(): void {
        // Mocks nur registrieren, wenn wir sie wirklich brauchen
        if (!$this->apiDisabled) {
            return;
        }

        $this->useMockClient = true;
        $this->mockClient = MockDataLoader::createMockClientForDomain($this->mockDomain);
        $this->client = $this->mockClient;
        self::logDebug("Mock mode enabled for domain: {$this->mockDomain}");
    }

    /**
     * Registriert zusätzliche Mock-Responses für spezifische Tests.
     * Nur im Mock-Modus aktiv - wird bei verfügbarer API ignoriert.
     */
    protected function registerMockResponse(
        string $method,
        string $uri,
        int $statusCode = 200,
        mixed $body = null,
        array $headers = ['Content-Type' => 'application/json']
    ): void {
        // Keine Mock-Registrierung wenn API verfügbar
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
     * Überspringt den Test im Mock-Modus, wenn die Entity-Struktur zu komplex für generische Mock-Daten ist.
     * Verwende diese Methode in Tests mit verschachtelten Entity-Hierarchien.
     *
     * @param string $reason Optionaler Grund für das Überspringen
     */
    protected function skipMockIfComplexEntity(string $reason = 'Entity structure too complex for generic mock data'): void {
        if ($this->useMockClient) {
            $this->markTestSkipped($reason);
        }
    }

    /**
     * Überspringt den Test nur, wenn wir NICHT im Mock-Modus sind und die API deaktiviert ist.
     * Im Mock-Modus wird der Test mit Mock-Daten ausgeführt.
     */
    protected function skipIfApiDisabledAndNoMock(): void {
        if ($this->apiDisabled && !$this->useMockClient) {
            $this->markTestSkipped('API is disabled and no mock data available');
        }
    }
}
