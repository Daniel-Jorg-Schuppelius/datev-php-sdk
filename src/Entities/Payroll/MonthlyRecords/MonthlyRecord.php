<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthlyRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\MonthlyRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class MonthlyRecord extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected MonthlyRecordID $id;
    protected ?string $personnel_number;
    protected ?DateTime $month_of_emergence;
    protected ?string $salary_type_id;
    protected ?string $cost_center_id;
    protected ?int $cost_unit_id;
    protected ?float $value;
    protected ?float $differing_factor;
    protected ?float $differing_pay_change;
    protected ?string $origin;
    protected ?DateTime $accounting_month;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): MonthlyRecordID {
        return $this->id;
    }

    public function getPersonnelNumber(): ?string {
        return $this->personnel_number ?? null;
    }

    public function getMonthOfEmergence(): ?DateTime {
        return $this->month_of_emergence ?? null;
    }

    public function getSalaryTypeID(): ?string {
        return $this->salary_type_id ?? null;
    }

    public function getCostCenterID(): ?string {
        return $this->cost_center_id ?? null;
    }

    public function getCostUnitID(): ?int {
        return $this->cost_unit_id ?? null;
    }

    public function getValue(): ?float {
        return $this->value ?? null;
    }

    public function getDifferingFactor(): ?float {
        return $this->differing_factor ?? null;
    }

    public function getDifferingPayChange(): ?float {
        return $this->differing_pay_change ?? null;
    }

    public function getOrigin(): ?string {
        return $this->origin ?? null;
    }

    public function getAccountingMonth(): ?DateTime {
        return $this->accounting_month ?? null;
    }
}
