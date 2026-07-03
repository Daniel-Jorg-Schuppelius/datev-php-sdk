<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeExportsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExports;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Abstracts\API\Online\EmployeeScopedEndpointAbstract;
use Datev\Entities\Online\HrExports\Absences\Absences;
use Datev\Entities\Online\HrExports\MasterData\MasterData;
use Datev\Entities\Online\HrExports\SalaryPayments\SalaryPayments;
use Datev\Entities\Online\HrExports\SalaryTotalValues\SalaryTotalValues;
use Datev\Entities\Online\HrExports\SocialSecurityPayments\SocialSecurityPayments;
use Datev\Entities\Online\HrExports\TaxPayments\TaxPayments;

/**
 * hr:exports v1: Auswertungsdaten eines einzelnen Arbeitnehmers
 * (/clients/{client-id}/employees/{employee-id}/...).
 *
 * Zeitraumfilter über Query-Parameter: payroll_accounting_month(_end),
 * payroll_recalculation_month(_end).
 */
class EmployeeExportsEndpoint extends EmployeeScopedEndpointAbstract {
    /**
     * @param array<string, mixed> $queryParams
     */
    public function getTaxPayments(array $queryParams = []): ?TaxPayments {
        return $this->fetchEntity(TaxPayments::class, 'taxpayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSocialSecurityPayments(array $queryParams = []): ?SocialSecurityPayments {
        return $this->fetchEntity(SocialSecurityPayments::class, 'socialsecuritypayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSalaryTotalValues(array $queryParams = []): ?SalaryTotalValues {
        return $this->fetchEntity(SalaryTotalValues::class, 'salarytotalvalues', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSalaryPayments(array $queryParams = []): ?SalaryPayments {
        return $this->fetchEntity(SalaryPayments::class, 'salarypayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getMasterData(array $queryParams = []): ?MasterData {
        return $this->fetchEntity(MasterData::class, 'masterdata', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getAbsences(array $queryParams = []): ?Absences {
        return $this->fetchEntity(Absences::class, 'absences', $queryParams);
    }

    /**
     * @template T of NamedEntity
     * @param class-string<T> $entityClass
     * @param array<string, mixed> $queryParams
     * @return T|null
     */
    private function fetchEntity(string $entityClass, string $resource, array $queryParams): ?NamedEntity {
        $response = $this->logDebugWithTimer(function () use ($resource, $queryParams) {
            $result = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$resource}");

            return (empty($result) || $result === '[]') ? null : $result;
        }, "Fetching employee {$resource}");

        if ($response === null) {
            return null;
        }

        return $entityClass::fromJson($response, self::$logger);
    }
}
