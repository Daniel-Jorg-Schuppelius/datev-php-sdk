<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MockClient.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\API\AuthenticationInterface;
use ERRORToolkit\Traits\ErrorLog;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Mock Client für Offline-Tests der DATEV API Endpoints.
 * Simuliert API-Antworten ohne echte Netzwerkkommunikation.
 */
class MockClient implements ApiClientInterface {
    use ErrorLog;

    /** @var array<string, array<string, mixed>> Registrierte Mock-Antworten */
    private array $mockResponses = [];

    /** @var array<string, mixed> Aufgezeichnete Requests */
    private array $recordedRequests = [];

    private ?AuthenticationInterface $authentication = null;
    private string $baseUrl;

    /** @var array<string, string> */
    private array $defaultHeaders = [];

    public function __construct(string $baseUrl = 'https://127.0.0.1:58452', ?LoggerInterface $logger = null) {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->initializeLogger($logger);
    }

    /**
     * Registriert eine Mock-Antwort für einen bestimmten Endpoint.
     *
     * @param string $method HTTP-Methode (GET, POST, PUT, DELETE)
     * @param string $uriPattern URI-Muster (kann Regex sein)
     * @param int $statusCode HTTP-Statuscode
     * @param mixed $body Antwort-Body (wird zu JSON serialisiert)
     * @param array<string, string> $headers Antwort-Headers
     */
    public function registerMockResponse(
        string $method,
        string $uriPattern,
        int $statusCode = 200,
        mixed $body = null,
        array $headers = ['Content-Type' => 'application/json']
    ): self {
        $key = strtoupper($method) . ':' . $uriPattern;
        $this->mockResponses[$key] = [
            'statusCode' => $statusCode,
            'body' => $body,
            'headers' => $headers,
        ];
        return $this;
    }

    /**
     * Registriert mehrere Mock-Antworten aus einem Array.
     *
     * @param array<string, array<string, mixed>> $responses
     */
    public function registerMockResponses(array $responses): self {
        foreach ($responses as $pattern => $config) {
            [$method, $uri] = explode(':', $pattern, 2);
            $this->registerMockResponse(
                $method,
                $uri,
                $config['statusCode'] ?? 200,
                $config['body'] ?? null,
                $config['headers'] ?? ['Content-Type' => 'application/json']
            );
        }
        return $this;
    }

    /**
     * Lädt Mock-Daten aus einer JSON-Datei.
     *
     * @param string $filePath Pfad zur JSON-Datei
     */
    public function loadMockDataFromFile(string $filePath): self {
        if (!file_exists($filePath)) {
            $this->logWarning("Mock data file not found: {$filePath}");
            return $this;
        }

        $content = file_get_contents($filePath);
        if ($content === false) {
            $this->logWarning("Could not read mock data file: {$filePath}");
            return $this;
        }

        $data = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->logWarning("Invalid JSON in mock data file: {$filePath}");
            return $this;
        }

        return $this->registerMockResponses($data);
    }

    /**
     * Findet eine passende Mock-Antwort für den Request.
     */
    private function findMockResponse(string $method, string $uri): ?array {
        $method = strtoupper($method);

        // Extrahiere URI ohne Query-Parameter für das Matching
        $uriWithoutQuery = parse_url($uri, PHP_URL_PATH) ?? $uri;

        // Exakter Match mit vollständiger URI
        $exactKey = "{$method}:{$uri}";
        if (isset($this->mockResponses[$exactKey])) {
            return $this->mockResponses[$exactKey];
        }

        // Exakter Match ohne Query-Parameter
        $exactKeyWithoutQuery = "{$method}:{$uriWithoutQuery}";
        if (isset($this->mockResponses[$exactKeyWithoutQuery])) {
            return $this->mockResponses[$exactKeyWithoutQuery];
        }

        // Regex/Pattern Match
        foreach ($this->mockResponses as $pattern => $response) {
            [$patternMethod, $patternUri] = explode(':', $pattern, 2);
            if (strtoupper($patternMethod) !== $method) {
                continue;
            }

            // Wandle Wildcard-Pattern in Regex um
            $regex = str_replace(['*', '{id}', '{guid}'], ['.*', '[^/]+', '[a-f0-9-]+'], $patternUri);

            // Prüfe sowohl mit als auch ohne Query-Parameter
            if (preg_match("#^{$regex}$#i", $uri) || preg_match("#^{$regex}$#i", $uriWithoutQuery)) {
                return $response;
            }
        }

        return null;
    }

    /**
     * Erstellt eine PSR-7 Response aus Mock-Daten.
     */
    private function createResponse(array $mockData): ResponseInterface {
        $body = $mockData['body'];
        if (is_array($body) || is_object($body)) {
            $body = json_encode($body);
        }

        return new Response(
            $mockData['statusCode'],
            $mockData['headers'],
            $body
        );
    }

    /**
     * Zeichnet einen Request auf.
     */
    private function recordRequest(string $method, string $uri, array $options): void {
        $this->recordedRequests[] = [
            'method' => $method,
            'uri' => $uri,
            'options' => $options,
            'timestamp' => microtime(true),
        ];
    }

    /**
     * Gibt alle aufgezeichneten Requests zurück.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRecordedRequests(): array {
        return $this->recordedRequests;
    }

    /**
     * Löscht alle aufgezeichneten Requests.
     */
    public function clearRecordedRequests(): void {
        $this->recordedRequests = [];
    }

    /**
     * Löscht alle registrierten Mock-Antworten.
     */
    public function clearMockResponses(): void {
        $this->mockResponses = [];
    }

    /**
     * Setzt den MockClient komplett zurück.
     */
    public function reset(): void {
        $this->clearMockResponses();
        $this->clearRecordedRequests();
    }

    // ApiClientInterface Implementation

    public function get(string $uri, array $options = []): ResponseInterface {
        return $this->request('GET', $uri, $options);
    }

    public function post(string $uri, array $options = []): ResponseInterface {
        return $this->request('POST', $uri, $options);
    }

    public function put(string $uri, array $options = []): ResponseInterface {
        return $this->request('PUT', $uri, $options);
    }

    public function patch(string $uri, array $options = []): ResponseInterface {
        return $this->request('PATCH', $uri, $options);
    }

    public function delete(string $uri, array $options = []): ResponseInterface {
        return $this->request('DELETE', $uri, $options);
    }

    private function request(string $method, string $uri, array $options = []): ResponseInterface {
        $this->recordRequest($method, $uri, $options);
        $this->logDebug("Mock {$method} request to {$uri}", $options);

        $mockData = $this->findMockResponse($method, $uri);

        if ($mockData === null) {
            $this->logDebug("No mock response found for {$method} {$uri}, returning 404");
            return new Response(404, ['Content-Type' => 'application/json'], json_encode([
                'error' => 'Not Found',
                'message' => "No mock response registered for {$method} {$uri}"
            ]));
        }

        return $this->createResponse($mockData);
    }

    public function getBaseUrl(): string {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function setAuthentication(AuthenticationInterface $authentication): void {
        $this->authentication = $authentication;
    }

    public function getAuthentication(): ?AuthenticationInterface {
        return $this->authentication;
    }

    public function setDefaultHeaders(array $headers): void {
        $this->defaultHeaders = $headers;
    }

    public function getDefaultHeaders(): array {
        return $this->defaultHeaders;
    }

    public function addDefaultHeader(string $name, string $value): void {
        $this->defaultHeaders[$name] = $value;
    }

    public function removeDefaultHeader(string $name): void {
        unset($this->defaultHeaders[$name]);
    }

    public function setVerifySSL(bool $verify): void {
        // Mock braucht keine SSL-Verifizierung
    }

    public function getVerifySSL(): bool {
        return false;
    }

    public function setTimeout(float $timeout): void {
        // Mock braucht keine Timeouts
    }

    public function getTimeout(): float {
        return 30.0;
    }

    public function setConnectTimeout(float $timeout): void {
        // Mock braucht keine Timeouts
    }

    public function getConnectTimeout(): float {
        return 10.0;
    }

    public function setProxy(?string $proxy): void {
        // Mock braucht keinen Proxy
    }

    public function getProxy(): ?string {
        return null;
    }

    public function setUserAgent(?string $userAgent): void {
        // Mock braucht keinen User-Agent
    }

    public function getUserAgent(): ?string {
        return null;
    }

    public function setDefaultQueryParams(array $params): void {
        // Mock speichert keine Query-Params
    }

    public function getDefaultQueryParams(): array {
        return [];
    }

    public function addDefaultQueryParam(string $name, mixed $value): void {
        // Mock speichert keine Query-Params
    }

    public function removeDefaultQueryParam(string $name): void {
        // Mock speichert keine Query-Params
    }

    public function setRequestInterval(float $requestInterval): void {
        // Mock braucht kein Request-Intervall
    }

    public function setMaxRetries(int $maxRetries): void {
        // Mock braucht keine Retries
    }

    public function getMaxRetries(): int {
        return 0;
    }

    public function setBaseRetryDelay(int $seconds): void {
        // Mock braucht keine Retry-Delays
    }

    public function getBaseRetryDelay(): int {
        return 0;
    }

    public function setExponentialBackoff(bool $enabled): void {
        // Mock braucht kein Backoff
    }

    public function isExponentialBackoffEnabled(): bool {
        return false;
    }
}
