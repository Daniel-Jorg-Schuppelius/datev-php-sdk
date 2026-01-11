<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryType;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypes;
use InvalidArgumentException;

class SalaryTypesEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'salary-types';

    public function get(?ID $id = null): ?SalaryType {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return SalaryType::fromJson($response, self::$logger);
        }, "Fetching SalaryType (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?SalaryTypes {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return SalaryTypes::fromJson($response, self::$logger);
        }, "Searching SalaryTypes");
    }
}
