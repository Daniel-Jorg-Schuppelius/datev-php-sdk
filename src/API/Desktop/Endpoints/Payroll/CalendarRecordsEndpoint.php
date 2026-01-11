<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CalendarRecordsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecord;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecords;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class CalendarRecordsEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'calendar-records';

    public function get(?ID $id = null): ?CalendarRecord {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CalendarRecord::fromJson($response, self::$logger);
        }, "Fetching CalendarRecord (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?CalendarRecords {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CalendarRecords::fromJson($response, self::$logger);
        }, "Searching CalendarRecords");
    }

    public function createBatch(CalendarRecords $records): ResponseInterface {
        return $this->logDebugWithTimer(function () use ($records) {
            return $this->postContent($records, [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/batch");
        }, "Creating batch CalendarRecords");
    }
}
