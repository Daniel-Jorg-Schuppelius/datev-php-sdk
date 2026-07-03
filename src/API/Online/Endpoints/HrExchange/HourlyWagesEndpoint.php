<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HourlyWagesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{EmployeeScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Employees\HourlyWage;
use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * hr:exchange v1: Stundenlöhne eines Arbeitnehmers (202-async).
 */
class HourlyWagesEndpoint extends EmployeeScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'hourly-wages';

    /**
     * @param HourlyWage|array<string, mixed> $hourlyWage
     */
    public function create(HourlyWage|array $hourlyWage): ?Job {
        $data = $hourlyWage instanceof HourlyWage ? $hourlyWage->toArray() : $hourlyWage;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data),
            'Creating HourlyWage'
        );
    }

    /**
     * @param HourlyWage|array<string, mixed> $hourlyWage
     */
    public function update(HourlyWage|array $hourlyWage): ?Job {
        $data = $hourlyWage instanceof HourlyWage ? $hourlyWage->toArray() : $hourlyWage;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', null, $data),
            'Updating HourlyWage'
        );
    }

    /**
     * @param HourlyWage|array<string, mixed> $hourlyWage
     */
    public function updateById(int|string $hourlyWageId, HourlyWage|array $hourlyWage): ?Job {
        $data = $hourlyWage instanceof HourlyWage ? $hourlyWage->toArray() : $hourlyWage;
        $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode((string) $hourlyWageId);

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', $urlPath, $data),
            "Updating HourlyWage (ID: {$hourlyWageId})"
        );
    }
}
