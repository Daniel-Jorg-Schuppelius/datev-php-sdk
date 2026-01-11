<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\Health\Health;

class HealthEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'health';

    public function get(?ID $id = null): ?Health {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents();

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Health::fromJson($response, self::$logger);
        }, 'Fetching Health');
    }
}
