<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop;

use APIToolkit\Contracts\Abstracts\API\ClientAbstract;
use APIToolkit\Contracts\Interfaces\API\AuthenticationInterface;
use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * API-Client für die lokale DATEV-Desktop-API.
 *
 * Endpoints verwenden host-relative Pfade ("datev/api/…"); der Client baut
 * daraus die vollständige Ziel-URL und ist damit unabhängig von der base_uri
 * eines injizierten Transports.
 */
class Client extends ClientAbstract {
    /**
     * @param HttpClient|null $httpClient Vorkonfigurierter Guzzle-Client — Naht
     *                                    für Tests (MockHandler) und für
     *                                    Anwendungen mit eigenem Transport.
     */
    public function __construct(
        ?AuthenticationInterface $authentication = null,
        string $baseUrl = 'https://127.0.0.1:58452',
        ?LoggerInterface $logger = null,
        bool $sleepAfterRequest = false,
        bool $verifySSL = false,
        ?HttpClient $httpClient = null
    ) {
        parent::__construct($baseUrl, $logger, $sleepAfterRequest, $httpClient);

        $this->setVerifySSL($verifySSL);
        $this->setTimeout(120.0);
        $this->setDefaultHeaders([
            'Accept' => 'application/json;charset=utf-8',
            'Content-Type' => 'application/json;charset=utf-8',
        ]);

        if ($authentication !== null) {
            $this->setAuthentication($authentication);
        }
    }

    /**
     * Baut aus einem host-relativen URI die vollständige Ziel-URL.
     * Absolute URLs bleiben unverändert.
     */
    protected function prefixUri(string $uri): string {
        if ($uri === '' || str_starts_with($uri, 'http://') || str_starts_with($uri, 'https://')) {
            return $uri;
        }

        return $this->getBaseUrl() . '/' . ltrim($uri, '/');
    }

    /**
     * @param array<string, mixed> $options
     */
    public function get(string $uri, array $options = []): ResponseInterface {
        return parent::get($this->prefixUri($uri), $options);
    }

    /**
     * @param array<string, mixed> $options
     */
    public function post(string $uri, array $options = []): ResponseInterface {
        return parent::post($this->prefixUri($uri), $options);
    }

    /**
     * @param array<string, mixed> $options
     */
    public function put(string $uri, array $options = []): ResponseInterface {
        return parent::put($this->prefixUri($uri), $options);
    }

    /**
     * @param array<string, mixed> $options
     */
    public function patch(string $uri, array $options = []): ResponseInterface {
        return parent::patch($this->prefixUri($uri), $options);
    }

    /**
     * @param array<string, mixed> $options
     */
    public function delete(string $uri, array $options = []): ResponseInterface {
        return parent::delete($this->prefixUri($uri), $options);
    }
}
