<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\GrossPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class GrossPayment extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected GrossPaymentID $id;
    protected ?string $personnel_number;
    protected ?float $amount;
    protected ?string $salary_type_id;
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

    public function getSalaryTypeID(): ?string {
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
