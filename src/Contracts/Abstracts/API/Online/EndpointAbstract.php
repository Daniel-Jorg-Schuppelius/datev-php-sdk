<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use APIToolkit\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\ApiException;
use InvalidArgumentException;
use Psr\Http\Message\{ResponseInterface, StreamInterface};

/**
 * Basisklasse für Endpoints der DATEV-Online-Dienste.
 *
 * Endpoints erzeugen dienst-relative Pfade (prefix/endpoint/suffix, ohne
 * führenden Slash); der Online-Client stellt den Basispfad des Dienstes voran.
 *
 * Ergänzt die JSON-Helfer des Toolkits um Antworten mit relevanten Headern
 * (Location, Link, Total-Items, x-*-page*), Multipart-/Binary-Uploads,
 * merge-patch+json sowie Binary-Downloads mit Accept-Negotiation.
 */
abstract class EndpointAbstract extends APIEndpointAbstract {
    /**
     * Default-Implementierung des EndpointInterface; Endpoints mit
     * Einzelressourcen-GET überschreiben diese Methode (Parameter-Widening
     * auf die dienstspezifische ID-Form ist erlaubt).
     */
    public function get(?ID $id = null): ?NamedEntityInterface {
        return null;
    }

    /**
     * Baut die dienst-relative URL aus prefix/endpoint/suffix.
     *
     * Anders als der Toolkit-Builder wird der endpointSuffix auch ohne
     * endpointPrefix berücksichtigt (Online-Endpoints haben keinen Prefix,
     * nutzen aber Suffixe wie "files" oder "jobs" unterhalb von
     * clients/{client-id} bzw. tenants/{tenant-id}).
     */
    protected function getEndpointUrl(): string {
        $endpoint = trim($this->endpoint, '/');

        if (empty($endpoint)) {
            self::logErrorAndThrow(
                InvalidArgumentException::class,
                'The endpoint must be set (Class: ' . static::class . ')'
            );
        }

        $parts = array_filter([
            rtrim($this->endpointPrefix, '/'),
            $endpoint,
            ltrim($this->endpointSuffix, '/'),
        ], fn (string $part) => $part !== '');

        return implode('/', $parts);
    }

    /**
     * Führt einen Request aus und liefert die vollständige Response zurück
     * (inkl. Header). Der Statuscode wird gegen die erwarteten Codes geprüft.
     *
     * @param int|array<int, int> $expectedStatusCodes
     * @param array<string, mixed> $options
     */
    protected function requestResponse(string $method, ?string $urlPath = null, array $options = [], int|array $expectedStatusCodes = 200): ResponseInterface {
        $urlPath ??= $this->getEndpointUrl();

        $response = match (strtoupper($method)) {
            'GET' => $this->client->get($urlPath, $options),
            'POST' => $this->client->post($urlPath, $options),
            'PUT' => $this->client->put($urlPath, $options),
            'PATCH' => $this->client->patch($urlPath, $options),
            'DELETE' => $this->client->delete($urlPath, $options),
            default => self::logErrorAndThrow(InvalidArgumentException::class, "Unsupported HTTP method: {$method}"),
        };

        return $this->expectStatus($response, $expectedStatusCodes);
    }

    /**
     * Prüft den Statuscode einer Response gegen die erwarteten Codes.
     *
     * @param int|array<int, int> $expectedStatusCodes
     */
    protected function expectStatus(ResponseInterface $response, int|array $expectedStatusCodes): ResponseInterface {
        $statusCode = $response->getStatusCode();

        if (!in_array($statusCode, (array) $expectedStatusCodes, true)) {
            throw new ApiException('Unexpected response status code', $statusCode, $response, null);
        }

        return $response;
    }

    /**
     * Multipart-Upload (multipart/form-data), z. B. Belege oder Lohndateien.
     * Guzzle setzt Content-Type samt Boundary selbst.
     *
     * @param array<int, array<string, mixed>> $multipart Guzzle-Multipart-Elemente
     * @param int|array<int, int> $expectedStatusCodes
     * @param array<string, mixed> $headers
     */
    protected function postMultipartRequest(array $multipart, ?string $urlPath = null, int|array $expectedStatusCodes = [200, 201, 202], array $headers = []): ResponseInterface {
        $options = ['multipart' => $multipart];
        if (!empty($headers)) {
            $options['headers'] = $headers;
        }

        return $this->requestResponse('POST', $urlPath, $options, $expectedStatusCodes);
    }

    /**
     * Multipart-Upload per PUT (z. B. accounting:documents mit Dokument-ID).
     *
     * @param array<int, array<string, mixed>> $multipart Guzzle-Multipart-Elemente
     * @param int|array<int, int> $expectedStatusCodes
     * @param array<string, mixed> $headers
     */
    protected function putMultipartRequest(array $multipart, ?string $urlPath = null, int|array $expectedStatusCodes = [200, 201, 202], array $headers = []): ResponseInterface {
        $options = ['multipart' => $multipart];
        if (!empty($headers)) {
            $options['headers'] = $headers;
        }

        return $this->requestResponse('PUT', $urlPath, $options, $expectedStatusCodes);
    }

    /**
     * Roher Binary-Upload (z. B. application/octet-stream für EXTF-Dateien).
     *
     * @param array<string, string> $headers Zusätzliche Header, z. B. ['Filename' => ...]
     * @param int|array<int, int> $expectedStatusCodes
     */
    protected function postBinary(string|StreamInterface $body, string $contentType, array $headers = [], ?string $urlPath = null, int|array $expectedStatusCodes = 202): ResponseInterface {
        $options = [
            'body' => $body,
            'headers' => $headers + ['Content-Type' => $contentType],
        ];

        return $this->requestResponse('POST', $urlPath, $options, $expectedStatusCodes);
    }

    /**
     * PUT mit application/merge-patch+json (z. B. Finalisieren von DXSO-Jobs).
     *
     * @param array<string, mixed> $data
     * @param int|array<int, int> $expectedStatusCodes
     */
    protected function putMergePatch(array $data, ?string $urlPath = null, int|array $expectedStatusCodes = [200, 204]): ResponseInterface {
        $options = [
            'body' => json_encode($data, JSON_THROW_ON_ERROR),
            'headers' => ['Content-Type' => 'application/merge-patch+json'],
        ];

        return $this->requestResponse('PUT', $urlPath, $options, $expectedStatusCodes);
    }

    /**
     * Binary-Download mit Accept-Negotiation (z. B. application/pdf oder application/zip).
     *
     * @param array<string, mixed> $queryParams
     */
    protected function getBinary(?string $urlPath = null, string $accept = 'application/pdf', array $queryParams = []): ResponseInterface {
        $urlPath ??= $this->getEndpointUrl();

        $queryString = http_build_query($queryParams);
        if ($queryString !== '') {
            $urlPath .= "?{$queryString}";
        }

        return $this->requestResponse('GET', $urlPath, ['headers' => ['Accept' => $accept]], 200);
    }

    /**
     * Zerlegt eine application/x-ndjson-Antwort in dekodierte Zeilen.
     *
     * @return array<int, mixed>
     */
    protected function parseNdjson(string $body): array {
        $rows = [];

        foreach (explode("\n", $body) as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            $rows[] = json_decode($line, true, 512, JSON_THROW_ON_ERROR);
        }

        return $rows;
    }
}
