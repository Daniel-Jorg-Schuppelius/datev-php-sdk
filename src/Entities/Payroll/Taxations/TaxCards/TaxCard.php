<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Taxations\TaxCards;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class TaxCard extends NamedEntity implements IdentifiableNamedEntityInterface {
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

    public function getTaxClass(): ?int {
        return $this->tax_class ?? null;
    }

    public function getFactor(): ?float {
        return $this->factor ?? null;
    }

    public function getDenomination(): ?string {
        return $this->denomination ?? null;
    }

    public function getSpousesDenomination(): ?string {
        return $this->spouses_denomination ?? null;
    }

    public function getMonthlyTaxAllowance(): ?float {
        return $this->monthly_tax_allowance ?? null;
    }

    public function getAnnualTaxAllowance(): ?float {
        return $this->annual_tax_allowance ?? null;
    }

    public function getChildTaxAllowances(): ?string {
        return $this->child_tax_allowances ?? null;
    }
}
