<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientBasicAuth.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop;

use APIToolkit\Contracts\Abstracts\API\ClientAbstract;
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
            'timeout' => 120,
            'verify' => false,  // SSL-Zertifikatsüberprüfung deaktivieren (nur wenn nötig)
        ]), $logger, $sleepAfterRequest);
    }
}
