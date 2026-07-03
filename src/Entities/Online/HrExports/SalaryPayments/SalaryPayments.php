<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryPayments.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SalaryPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Lohnarten und Nettobezüge eines Arbeitnehmers je Abrechnungsmonat.
 */
class SalaryPayments extends NamedEntity {
    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected GrossPaymentsLodasList $gross_payments_lodas;

    protected GrossPaymentsLugList $gross_payments_lug;

    protected NetPaymentsList $net_payments;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getAccountingMonth(): ?string {
        return $this->accounting_month ?? null;
    }

    public function getMonthOfRecalculation(): ?string {
        return $this->month_of_recalculation ?? null;
    }

    public function getGrossPaymentsLodas(): ?GrossPaymentsLodasList {
        return $this->gross_payments_lodas ?? null;
    }

    public function getGrossPaymentsLug(): ?GrossPaymentsLugList {
        return $this->gross_payments_lug ?? null;
    }

    public function getNetPayments(): ?NetPaymentsList {
        return $this->net_payments ?? null;
    }
}
