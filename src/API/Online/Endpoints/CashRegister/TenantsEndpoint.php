<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TenantsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\CashRegister;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Online\EndpointAbstract;
use Datev\Entities\Online\CashRegister\Tenants\Tenants;

/**
 * cashregister:import v2: Liste der registrierten Bestände (Tenants).
 */
class TenantsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpoint = 'tenants';

    public function search(array $queryParams = [], array $options = []): ?Tenants {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Tenants::fromJson($response, self::$logger);
        }, 'Searching Tenants');
    }
}
