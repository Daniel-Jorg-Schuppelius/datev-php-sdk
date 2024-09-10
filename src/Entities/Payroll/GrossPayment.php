<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class GrossPayment extends NamedEntity implements IdentifiableInterface {
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
}