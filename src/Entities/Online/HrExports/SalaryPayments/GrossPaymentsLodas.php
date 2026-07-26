<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentsLodas.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\SalaryPayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

/**
 * Bruttolohnart (LODAS).
 */
class GrossPaymentsLodas extends NamedEntity {
    use MoneyAccessorTrait;

    protected string $wage_type_name;

    protected string $wage_type_number;

    protected float $wage_type_amount;

    protected float $wage_type_amount_difference;

    protected string $tax_and_social_security_treatment_of_wage_type;

    protected bool $component_gross_payment;

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

    public function getWageTypeAmountDifference(): ?Money {
        return $this->toMoney($this->wage_type_amount_difference ?? null);
    }

    public function getTaxAndSocialSecurityTreatmentOfWageType(): ?string {
        return $this->tax_and_social_security_treatment_of_wage_type ?? null;
    }

    public function isComponentGrossPayment(): bool {
        return $this->component_gross_payment ?? false;
    }
}
