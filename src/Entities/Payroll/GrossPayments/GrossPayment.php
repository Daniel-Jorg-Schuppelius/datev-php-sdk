<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\GrossPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Payroll\Salaries\SalaryTypes\ID\SalaryTypeID;
use Psr\Log\LoggerInterface;

class GrossPayment extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected GrossPaymentID $id;
    protected ?string $personnel_number;
    protected ?float $amount;
    protected ?SalaryTypeID $salary_type_id;
    protected ?string $reduction;
    protected ?string $cost_center_allocation_id;
    protected ?string $cost_unit_allocation_id;
    protected ?string $payment_interval;
    protected ?DateTime $reference_date;


    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): GrossPaymentID {
        return $this->id;
    }

    public function getPersonnelNumber(): ?string {
        return $this->personnel_number ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getSalaryTypeID(): ?SalaryTypeID {
        return $this->salary_type_id ?? null;
    }

    public function getReduction(): ?string {
        return $this->reduction ?? null;
    }

    public function getCostCenterAllocationID(): ?string {
        return $this->cost_center_allocation_id ?? null;
    }

    public function getCostUnitAllocationID(): ?string {
        return $this->cost_unit_allocation_id ?? null;
    }

    public function getPaymentInterval(): ?string {
        return $this->payment_interval ?? null;
    }

    public function getReferenceDate(): ?DateTime {
        return $this->reference_date ?? null;
    }
}
