<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxCard.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use Psr\Log\LoggerInterface;

/**
 * Steuerkartendaten des Arbeitnehmers.
 */
class TaxCard extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $annual_tax_allowance;

    protected float $child_tax_allowances;

    protected string $denomination;

    protected float $factor;

    protected int $monthly_tax_allowance;

    protected string $spouses_denomination;

    protected string $tax_class;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAnnualTaxAllowance(): ?int {
        return $this->annual_tax_allowance ?? null;
    }

    public function getChildTaxAllowances(): ?Money {
        return $this->toMoney($this->child_tax_allowances ?? null);
    }

    public function getDenomination(): ?string {
        return $this->denomination ?? null;
    }

    public function getFactor(): ?float {
        return $this->factor ?? null;
    }

    public function getMonthlyTaxAllowance(): ?int {
        return $this->monthly_tax_allowance ?? null;
    }

    public function getSpousesDenomination(): ?string {
        return $this->spouses_denomination ?? null;
    }

    public function getTaxClass(): ?string {
        return $this->tax_class ?? null;
    }
}
