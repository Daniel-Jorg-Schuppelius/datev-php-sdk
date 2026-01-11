<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesQualificationEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\EmployeesQualification\EmployeesQualification;
use Datev\Entities\OrderManagement\EmployeesQualification\EmployeeQualification;

class EmployeesQualificationEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'employeesqualification';

    public function get(?ID $id = null): ?EmployeeQualification {
        if (is_null($id)) {
            return null;
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return EmployeeQualification::fromJson($response, self::$logger);
        }, "Fetching EmployeeQualification (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?EmployeesQualification {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return EmployeesQualification::fromJson($response, self::$logger);
        }, 'Searching EmployeesQualification');
    }
}
