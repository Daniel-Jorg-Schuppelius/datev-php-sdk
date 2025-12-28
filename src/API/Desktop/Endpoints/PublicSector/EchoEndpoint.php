<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Diagnostics\EchoResponse\EchoResponse;

class EchoEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'echo';

    public function get(?ID $id = null): ?EchoResponse {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return EchoResponse::fromJson($response, self::$logger);
    }
}
