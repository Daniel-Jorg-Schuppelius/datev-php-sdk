<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ChargeRatesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\{GUID, ID};
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\ChargeRates\{ChargeRate, ChargeRates};

class ChargeRatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'charge-rates';

    public function get(?ID $id = null): ?ChargeRate {
        if (is_null($id)) {
            return null;
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ChargeRate::fromJson($response, self::$logger);
        }, "Fetching ChargeRate (ID: {$id->toString()})");
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getForEmployee(GUID $employeeId, array $queryParams = []): ?ChargeRates {
        return $this->logDebugWithTimer(function () use ($employeeId, $queryParams) {
            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/employees/{$employeeId->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ChargeRates::fromJson($response, self::$logger);
        }, "Fetching ChargeRates for Employee (ID: {$employeeId})");
    }

    /**
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     */
    public function search(array $queryParams = [], array $options = []): ?ChargeRates {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ChargeRates::fromJson($response, self::$logger);
        }, 'Searching ChargeRates');
    }
}
