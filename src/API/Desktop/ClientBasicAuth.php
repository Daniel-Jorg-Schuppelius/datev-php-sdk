<?php

declare(strict_types=1);

namespace Datev\API\Desktop;

use Datev\Contracts\Abstracts\API\ClientAbstract;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client as HttpClient;

class ClientBasicAuth extends ClientAbstract {
    public function __construct(?string $username, ?string $password, string $baseUrl = 'https://127.0.0.1:58452', ?LoggerInterface $logger = null, bool $sleepAfterRequest = false) {
        parent::__construct(new HttpClient([
            'base_uri' => $baseUrl,
            'auth' => [$username, $password],
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
                'Accept' => 'application/json;charset=utf-8',
            ],
            'timeout' => 30,
            'verify' => false,  // SSL-Zertifikatsüberprüfung deaktivieren (nur wenn nötig)
        ]), $logger, $sleepAfterRequest);
    }
}
