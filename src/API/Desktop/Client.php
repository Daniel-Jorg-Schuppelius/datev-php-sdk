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
use Psr\Log\LoggerInterface;

class Client extends ClientAbstract {
    public function __construct(
        ?AuthenticationInterface $authentication = null,
        string $baseUrl = 'https://127.0.0.1:58452',
        ?LoggerInterface $logger = null,
        bool $sleepAfterRequest = false
    ) {
        parent::__construct($baseUrl, $logger, $sleepAfterRequest);

        $this->setVerifySSL(false);
        $this->setTimeout(120.0);
        $this->setDefaultHeaders([
            'Accept' => 'application/json;charset=utf-8',
            'Content-Type' => 'application/json;charset=utf-8',
        ]);

        if ($authentication !== null) {
            $this->setAuthentication($authentication);
        }
    }
}
