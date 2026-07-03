<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmploymentPeriodsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{EmployeeScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Employees\EmploymentPeriod;
use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * hr:exchange v1: Beschäftigungszeiträume eines Arbeitnehmers (202-async).
 */
class EmploymentPeriodsEndpoint extends EmployeeScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'employment-periods';

    /**
     * @param EmploymentPeriod|array<string, mixed> $period
     */
    public function create(EmploymentPeriod|array $period): ?Job {
        $data = $period instanceof EmploymentPeriod ? $period->toArray() : $period;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data),
            'Creating EmploymentPeriod'
        );
    }

    /**
     * @param EmploymentPeriod|array<string, mixed> $period
     */
    public function update(string $dateOfCommencementOfEmployment, EmploymentPeriod|array $period): ?Job {
        $data = $period instanceof EmploymentPeriod ? $period->toArray() : $period;
        $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($dateOfCommencementOfEmployment);

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', $urlPath, $data),
            "Updating EmploymentPeriod ({$dateOfCommencementOfEmployment})"
        );
    }

    public function delete(string $dateOfCommencementOfEmployment): ?Job {
        return $this->logDebugWithTimer(
            fn () => $this->writeJob('DELETE', "{$this->getEndpointUrl()}/" . rawurlencode($dateOfCommencementOfEmployment)),
            "Deleting EmploymentPeriod ({$dateOfCommencementOfEmployment})"
        );
    }
}
