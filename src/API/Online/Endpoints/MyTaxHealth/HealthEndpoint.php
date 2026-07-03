<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\MyTaxHealth;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\Common\Health\Health;

/**
 * my-tax:mytax-income-tax-documents-health: Spring-Boot-Actuator-Healthcheck.
 */
class HealthEndpoint extends EndpointAbstract {
    protected string $endpoint = 'actuator/health';

    public function get(?ID $id = null): ?Health {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents();

            if (empty($response)) {
                return null;
            }

            return Health::fromJson($response, self::$logger);
        }, 'Fetching Health');
    }
}
