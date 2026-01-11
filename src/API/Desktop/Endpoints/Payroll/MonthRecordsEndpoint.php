<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthRecordsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecord;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecords;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class MonthRecordsEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'month-records';

    public function get(?ID $id = null): ?MonthlyRecord {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return MonthlyRecord::fromJson($response, self::$logger);
        }, "Fetching MonthlyRecord (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?MonthlyRecords {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return MonthlyRecords::fromJson($response, self::$logger);
        }, "Searching MonthlyRecords");
    }

    public function createBatch(MonthlyRecords $records): ResponseInterface {
        return $this->logDebugWithTimer(function () use ($records) {
            return $this->postContent($records, [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/batch");
        }, "Creating batch MonthlyRecords");
    }
}
