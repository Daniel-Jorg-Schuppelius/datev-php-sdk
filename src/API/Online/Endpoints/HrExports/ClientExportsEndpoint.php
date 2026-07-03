<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientExportsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExports;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\HrExports\Absences\AbsencesList;
use Datev\Entities\Online\HrExports\MasterData\MasterDataList;
use Datev\Entities\Online\HrExports\SalaryPayments\SalaryPaymentsList;
use Datev\Entities\Online\HrExports\SalaryTotalValues\SalaryTotalValuesList;
use Datev\Entities\Online\HrExports\SocialSecurityPayments\SocialSecurityPaymentsList;
use Datev\Entities\Online\HrExports\TaxPayments\TaxPaymentsList;

/**
 * hr:exports v1: Auswertungsdaten aller Arbeitnehmer des Mandanten
 * (/clients/{client-id}/employees/...).
 *
 * Zeitraumfilter über Query-Parameter: payroll_accounting_month(_end),
 * payroll_recalculation_month(_end).
 */
class ClientExportsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'employees';

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getTaxPayments(array $queryParams = []): ?TaxPaymentsList {
        return $this->fetchCollection(TaxPaymentsList::class, 'taxpayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSocialSecurityPayments(array $queryParams = []): ?SocialSecurityPaymentsList {
        return $this->fetchCollection(SocialSecurityPaymentsList::class, 'socialsecuritypayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSalaryTotalValues(array $queryParams = []): ?SalaryTotalValuesList {
        return $this->fetchCollection(SalaryTotalValuesList::class, 'salarytotalvalues', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getSalaryPayments(array $queryParams = []): ?SalaryPaymentsList {
        return $this->fetchCollection(SalaryPaymentsList::class, 'salarypayments', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getMasterData(array $queryParams = []): ?MasterDataList {
        return $this->fetchCollection(MasterDataList::class, 'masterdata', $queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    public function getAbsences(array $queryParams = []): ?AbsencesList {
        return $this->fetchCollection(AbsencesList::class, 'absences', $queryParams);
    }

    /**
     * @template T of NamedValues
     * @param class-string<T> $collectionClass
     * @param array<string, mixed> $queryParams
     * @return T|null
     */
    private function fetchCollection(string $collectionClass, string $resource, array $queryParams): ?NamedValues {
        $response = $this->logDebugWithTimer(function () use ($resource, $queryParams) {
            $result = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$resource}");

            return (empty($result) || $result === '[]') ? null : $result;
        }, "Fetching client-level {$resource}");

        if ($response === null) {
            return null;
        }

        return $collectionClass::fromJson($response, self::$logger);
    }
}
