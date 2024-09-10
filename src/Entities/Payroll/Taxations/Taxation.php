<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Taxations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Taxation extends NamedEntity implements IdentifiableInterface {
    protected TaxationID $id;
    protected ?string $tax_identification_number;
    protected ?string $employment_type;
    protected ?float $requested_annual_allowance;
    protected ?bool $is_two_percent_flat_rate_taxation;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TaxationID {
        return $this->id;
    }
}