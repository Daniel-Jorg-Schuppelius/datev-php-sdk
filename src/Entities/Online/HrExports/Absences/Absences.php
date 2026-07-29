<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Absences.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\Absences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use Psr\Log\LoggerInterface;

/**
 * Fehlzeiten und Urlaubswerte eines Arbeitnehmers je Abrechnungsmonat.
 */
class Absences extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $accounting_month;

    protected string $month_of_recalculation;

    protected float $total_vacation_entitlement;

    protected float $vacation_days_taken;

    protected float $remaining_vacation_days_previous_year;

    protected float $remaining_vacation_days_current_year;

    protected float $sick_leave_month;

    protected float $sick_leave_hours;

    protected float $overtime;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    public function getTotalVacationEntitlement(): ?Money {
        return $this->toMoney($this->total_vacation_entitlement ?? null);
    }

    public function getVacationDaysTaken(): ?float {
        return $this->vacation_days_taken ?? null;
    }

    public function getRemainingVacationDaysPreviousYear(): ?float {
        return $this->remaining_vacation_days_previous_year ?? null;
    }

    public function getRemainingVacationDaysCurrentYear(): ?float {
        return $this->remaining_vacation_days_current_year ?? null;
    }

    public function getSickLeaveMonth(): ?float {
        return $this->sick_leave_month ?? null;
    }

    public function getSickLeaveHours(): ?float {
        return $this->sick_leave_hours ?? null;
    }

    public function getOvertime(): ?float {
        return $this->overtime ?? null;
    }
}
