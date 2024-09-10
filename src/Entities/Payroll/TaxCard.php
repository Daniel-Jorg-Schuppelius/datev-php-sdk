<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class TaxCard extends NamedEntity implements IdentifiableInterface {
    protected TaxCardID $id;
    protected ?int $tax_class;
    protected ?float $factor;
    protected ?string $denomination;
    protected ?string $spouses_denomination;
    protected ?float $monthly_tax_allowance;
    protected ?float $annual_tax_allowance;
    protected ?string $child_tax_allowances;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TaxCardID {
        return $this->id;
    }
}