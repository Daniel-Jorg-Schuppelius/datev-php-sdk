<?php

declare(strict_types=1);

namespace Datev\API\Desktop;

use APIToolkit\Contracts\Abstracts\API\ClientAbstract;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client as HttpClient;

class Client extends ClientAbstract {
    public function __construct(?string $apiKey, ?string $clientID, string $baseUrl = 'https://127.0.0.1:58452', ?LoggerInterface $logger = null, bool $sleepAfterRequest = false) {
        parent::__construct(new HttpClient([
            'base_uri' => $baseUrl,
            'timeout' => 120,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'X-Datev-Client-ID' => $clientID,
                'Accept' => 'application/json;charset=utf-8',
                'Content-Type' => 'application/json;charset=utf-8',
            ],
        ]), $logger, $sleepAfterRequest);
    }
}
