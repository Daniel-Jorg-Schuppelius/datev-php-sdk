<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MockEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Contracts;

use ERRORToolkit\Traits\ErrorLog;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Tests\Mocks\MockClient;
use Tests\Mocks\MockDataLoader;
use Tests\TestAPIClientFactory;

/**
 * Basis-Testklasse für Mock-basierte Endpoint-Tests.
 * Verwendet MockClient statt echtem API-Client.
 */
abstract class MockEndpointTest extends TestCase {
    use ErrorLog;

    protected MockClient $mockClient;
    protected ?LoggerInterface $logger = null;

    /**
     * Definiert die Domain für diesen Test.
     * Override in Subklassen.
     *
     * @return string 'diagnostics', 'accounting', 'clientmasterdata', 'payroll'
     */
    abstract protected function getDomain(): string;

    protected function setUp(): void {
        parent::setUp();

        $this->logger = TestAPIClientFactory::getLogger();
        self::setLogger($this->logger);

        $this->mockClient = MockDataLoader::createMockClientForDomain($this->getDomain());
    }

    protected function tearDown(): void {
        $this->mockClient->reset();
        parent::tearDown();
    }

    /**
     * Registriert eine zusätzliche Mock-Response für diesen Test.
     */
    protected function registerMockResponse(
        string $method,
        string $uri,
        int $statusCode = 200,
        mixed $body = null,
        array $headers = ['Content-Type' => 'application/json']
    ): void {
        $this->mockClient->registerMockResponse($method, $uri, $statusCode, $body, $headers);
    }

    /**
     * Gibt alle aufgezeichneten Requests zurück für Assertions.
     */
    protected function getRecordedRequests(): array {
        return $this->mockClient->getRecordedRequests();
    }

    /**
     * Prüft, ob ein bestimmter Request gemacht wurde.
     */
    protected function assertRequestWasMade(string $method, string $uriPattern): void {
        $requests = $this->getRecordedRequests();
        $found = false;

        foreach ($requests as $request) {
            if (strtoupper($request['method']) === strtoupper($method)) {
                if (str_contains($request['uri'], $uriPattern) || preg_match("#$uriPattern#", $request['uri'])) {
                    $found = true;
                    break;
                }
            }
        }

        $this->assertTrue($found, "Expected {$method} request to {$uriPattern} was not found in recorded requests.");
    }

    /**
     * Prüft die Anzahl der gemachten Requests.
     */
    protected function assertRequestCount(int $expected): void {
        $actual = count($this->getRecordedRequests());
        $this->assertEquals($expected, $actual, "Expected {$expected} requests, but {$actual} were made.");
    }
}
