<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthRecordsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{ClientScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Jobs\Job;
use Datev\Entities\Online\HrExchange\MonthRecords\MonthRecord;

/**
 * hr:exchange v1: Monats-Bewegungsdaten (202-async) —
 * auf Mandantenebene oder je Arbeitnehmer.
 */
class MonthRecordsEndpoint extends ClientScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'month-records';

    /**
     * POST /clients/{client-id}/month-records
     *
     * @param MonthRecord|array<string, mixed> $monthRecord
     */
    public function createForClient(MonthRecord|array $monthRecord): ?Job {
        $data = $monthRecord instanceof MonthRecord ? $monthRecord->toArray() : $monthRecord;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data),
            'Creating MonthRecord (client level)'
        );
    }

    /**
     * POST /clients/{client-id}/employees/{personnel-number}/month-records
     *
     * @param MonthRecord|array<string, mixed> $monthRecord
     */
    public function createForEmployee(int|string $personnelNumber, MonthRecord|array $monthRecord): ?Job {
        $data = $monthRecord instanceof MonthRecord ? $monthRecord->toArray() : $monthRecord;
        $urlPath = str_replace(
            '/month-records',
            '/employees/' . rawurlencode((string) $personnelNumber) . '/month-records',
            $this->getEndpointUrl()
        );

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', $urlPath, $data),
            "Creating MonthRecord (Personnel number: {$personnelNumber})"
        );
    }
}
