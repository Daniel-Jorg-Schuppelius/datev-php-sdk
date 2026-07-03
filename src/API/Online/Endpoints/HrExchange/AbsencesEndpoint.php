<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AbsencesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{EmployeeScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Absences\{AbsenceLodas, AbsenceLug};
use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * hr:exchange v1: Fehlzeiten eines Arbeitnehmers (LuG- und LODAS-Varianten,
 * alle Writes 202-async).
 */
class AbsencesEndpoint extends EmployeeScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'absences';

    /**
     * @param AbsenceLug|array<string, mixed> $absence
     */
    public function createLug(AbsenceLug|array $absence): ?Job {
        $data = $absence instanceof AbsenceLug ? $absence->toArray() : $absence;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', "{$this->getEndpointUrl()}/lug", $data),
            'Creating AbsenceLug'
        );
    }

    public function deleteLug(string $absenceId): ?Job {
        return $this->logDebugWithTimer(
            fn () => $this->writeJob('DELETE', "{$this->getEndpointUrl()}/lug/" . rawurlencode($absenceId)),
            "Deleting AbsenceLug (ID: {$absenceId})"
        );
    }

    /**
     * @param AbsenceLodas|array<string, mixed> $absence
     */
    public function createLodas(AbsenceLodas|array $absence): ?Job {
        $data = $absence instanceof AbsenceLodas ? $absence->toArray() : $absence;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', "{$this->getEndpointUrl()}/lodas", $data),
            'Creating AbsenceLodas'
        );
    }

    public function deleteLodas(string $absenceStartDate): ?Job {
        return $this->logDebugWithTimer(
            fn () => $this->writeJob('DELETE', "{$this->getEndpointUrl()}/lodas/" . rawurlencode($absenceStartDate)),
            "Deleting AbsenceLodas (Start date: {$absenceStartDate})"
        );
    }
}
