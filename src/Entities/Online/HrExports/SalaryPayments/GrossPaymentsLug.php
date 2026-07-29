<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentsLug.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SalaryPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use Psr\Log\LoggerInterface;

/**
 * Bruttolohnart (Lohn und Gehalt).
 */
class GrossPaymentsLug extends NamedEntity {
    use MoneyAccessorTrait;

    protected string $wage_type_name;

    protected string $wage_type_number;

    protected float $wage_type_amount;

    protected string $tax_treatment_of_wage_type;

    protected string $social_security_treatment_of_wage_type;

    protected bool $component_gross_payment;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getWageTypeName(): ?string {
        return $this->wage_type_name ?? null;
    }

    public function getWageTypeNumber(): ?string {
        return $this->wage_type_number ?? null;
    }

    public function getWageTypeAmount(): ?Money {
        return $this->toMoney($this->wage_type_amount ?? null);
    }

    public function getTaxTreatmentOfWageType(): ?string {
        return $this->tax_treatment_of_wage_type ?? null;
    }

    public function getSocialSecurityTreatmentOfWageType(): ?string {
        return $this->social_security_treatment_of_wage_type ?? null;
    }

    public function isComponentGrossPayment(): bool {
        return $this->component_gross_payment ?? false;
    }
}
