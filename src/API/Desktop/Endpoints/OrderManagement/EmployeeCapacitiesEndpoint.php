<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCapacitiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacities;
use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacity;

class EmployeeCapacitiesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'employeecapacities';

    public function get(?ID $id = null): ?EmployeeCapacity {
        if (is_null($id)) {
            return null;
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return EmployeeCapacity::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?EmployeeCapacities {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return EmployeeCapacities::fromJson($response, self::$logger);
    }
}
