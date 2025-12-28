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
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\ChargeRates\ChargeRate;
use Datev\Entities\OrderManagement\ChargeRates\ChargeRates;
use InvalidArgumentException;

class ChargeRatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'charge-rates';

    public function get(?ID $id = null): ?ChargeRate {
        if (is_null($id)) {
            return null;
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ChargeRate::fromJson($response, self::$logger);
    }

    public function getForEmployee(GUID $employeeId, array $queryParams = []): ?ChargeRates {
        $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/employees/{$employeeId->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ChargeRates::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?ChargeRates {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ChargeRates::fromJson($response, self::$logger);
    }
}
