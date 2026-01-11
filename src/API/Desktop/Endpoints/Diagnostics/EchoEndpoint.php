<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\Diagnostics;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Diagnostics\EchoResponse\EchoResponse;

class EchoEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'diagnostics/v1';
    protected string $endpoint = 'echo';

    public function get(?ID $id = null): ?EchoResponse {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return EchoResponse::fromJson($response, self::$logger);
        }, 'Fetching EchoResponse');
    }
}
