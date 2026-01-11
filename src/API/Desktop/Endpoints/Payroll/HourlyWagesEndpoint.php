<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HourlyWagesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\HourlyWages\HourlyWage;
use Datev\Entities\Payroll\HourlyWages\HourlyWages;
use InvalidArgumentException;

class HourlyWagesEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'hourly-wages';

    public function get(?ID $id = null): ?HourlyWage {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return HourlyWage::fromJson($response, self::$logger);
        }, "Fetching HourlyWage (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?HourlyWages {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return HourlyWages::fromJson($response, self::$logger);
        }, "Searching HourlyWages");
    }
}
