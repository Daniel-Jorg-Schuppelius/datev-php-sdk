<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online;

use APIToolkit\Contracts\Abstracts\API\ClientAbstract;
use APIToolkit\Contracts\Interfaces\API\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * API-Client für die DATEV-Online-Dienste (Cloud).
 *
 * Jeder Dienst hat einen eigenen Host (https://<service>.api.datev.de) mit dem
 * Basispfad /platform[-sandbox]/vN. Da Guzzle pfadbehaftete base_uri nicht
 * zuverlässig auflöst, wird der Basispfad hier selbst vorangestellt: Endpoints
 * verwenden dienst-relative Pfade (z. B. "clients/{id}"); absolute URLs und
 * gerootete Pfade (z. B. aus Location-Headern) passieren unverändert.
 */
class Client extends ClientAbstract {
    protected OnlineService $service;

    protected bool $sandbox;

    public function __construct(
        OnlineService $service,
        ?AuthenticationInterface $authentication = null,
        ?string $datevClientId = null,
        bool $sandbox = false,
        ?LoggerInterface $logger = null,
        bool $sleepAfterRequest = false
    ) {
        parent::__construct($service->host(), $logger, $sleepAfterRequest);

        $this->service = $service;
        $this->sandbox = $sandbox;

        $this->setTimeout(120.0);
        // Kein Default-Content-Type: Multipart- und Octet-Stream-Requests
        // setzen ihren eigenen; JSON-Requests nutzen die Guzzle-json-Option.
        $this->setDefaultHeaders(['Accept' => 'application/json']);

        if ($datevClientId !== null) {
            $this->addDefaultHeader($service->clientIdHeader(), $datevClientId);
        }

        if ($authentication !== null) {
            $this->setAuthentication($authentication);
        }
    }

    /**
     * Erzeugt einen Client für API-Key-Only-Dienste (Health-Stubs, Kassenarchiv):
     * Authentifizierung erfolgt ausschließlich über die Header
     * X-DATEV-Client-Id und X-DATEV-Client-Secret.
     */
    public static function forApiKey(
        OnlineService $service,
        string $datevClientId,
        string $datevClientSecret = '',
        bool $sandbox = false,
        ?LoggerInterface $logger = null,
        bool $sleepAfterRequest = false
    ): self {
        $client = new self($service, null, $datevClientId, $sandbox, $logger, $sleepAfterRequest);

        if ($datevClientSecret !== '') {
            $client->addDefaultHeader($service->clientSecretHeader(), $datevClientSecret);
        }

        return $client;
    }

    public function getService(): OnlineService {
        return $this->service;
    }

    public function isSandbox(): bool {
        return $this->sandbox;
    }

    /**
     * Basispfad des Dienstes, z. B. "/platform/v2".
     */
    public function getServicePath(): string {
        return $this->service->basePath($this->sandbox);
    }

    /**
     * Stellt dienst-relativen URIs den Basispfad voran.
     * Absolute URLs (http/https) und gerootete Pfade ("/...") bleiben unverändert.
     */
    protected function prefixUri(string $uri): string {
        if ($uri === '' || str_starts_with($uri, 'http://') || str_starts_with($uri, 'https://') || str_starts_with($uri, '/')) {
            return $uri;
        }

        return $this->getServicePath() . '/' . $uri;
    }

    public function get(string $uri, array $options = []): ResponseInterface {
        return parent::get($this->prefixUri($uri), $options);
    }

    public function post(string $uri, array $options = []): ResponseInterface {
        return parent::post($this->prefixUri($uri), $options);
    }

    public function put(string $uri, array $options = []): ResponseInterface {
        return parent::put($this->prefixUri($uri), $options);
    }

    public function patch(string $uri, array $options = []): ResponseInterface {
        return parent::patch($this->prefixUri($uri), $options);
    }

    public function delete(string $uri, array $options = []): ResponseInterface {
        return parent::delete($this->prefixUri($uri), $options);
    }
}
