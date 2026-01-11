<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\ContingencyFees\ContingencyFees;
use Datev\Entities\Law\CustomFields\CustomFields;
use Datev\Entities\Law\Employees\Employee;
use Datev\Entities\Law\Employees\Employees;
use InvalidArgumentException;

class EmployeesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'employees';

    public function get(?ID $id = null): ?Employee {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Employee::fromJson($response, self::$logger);
        }, "Fetching Employee (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?Employees {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Employees::fromJson($response, self::$logger);
        }, 'Searching Employees');
    }

    public function getContingencyFees(ID $id): ?ContingencyFees {
        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/contingency-fees");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ContingencyFees::fromJson($response, self::$logger);
        }, "Fetching ContingencyFees for Employee (ID: {$id})");
    }

    public function getCustomFields(ID $id): ?CustomFields {
        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/custom-fields");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CustomFields::fromJson($response, self::$logger);
        }, "Fetching CustomFields for Employee (ID: {$id})");
    }
}
