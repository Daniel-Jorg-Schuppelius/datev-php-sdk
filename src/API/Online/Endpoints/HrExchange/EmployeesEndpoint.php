<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{ClientScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Employees\Employee;
use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * hr:exchange v1: Anlage und Änderung von Arbeitnehmern (alle Writes 202-async).
 */
class EmployeesEndpoint extends ClientScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'employees';

    /**
     * Legt einen Arbeitnehmer an (POST /employees).
     *
     * @param Employee|array<string, mixed> $employee
     */
    public function create(Employee|array $employee): ?Job {
        $data = $employee instanceof Employee ? $employee->toArray() : $employee;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data),
            'Creating Employee'
        );
    }

    /**
     * Ändert einen Arbeitnehmer (PUT /employees; Personalnummer im Body).
     *
     * @param Employee|array<string, mixed> $employee
     */
    public function update(Employee|array $employee): ?Job {
        $data = $employee instanceof Employee ? $employee->toArray() : $employee;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', null, $data),
            'Updating Employee'
        );
    }

    /**
     * Ändert einen Arbeitnehmer über die Personalnummer im Pfad
     * (PUT /employees/{personnel-number}).
     *
     * @param Employee|array<string, mixed> $employee
     */
    public function updateOne(int|string $personnelNumber, Employee|array $employee): ?Job {
        $data = $employee instanceof Employee ? $employee->toArray() : $employee;
        $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode((string) $personnelNumber);

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', $urlPath, $data),
            "Updating Employee (Personnel number: {$personnelNumber})"
        );
    }
}
