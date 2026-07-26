<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use CommonToolkit\ValueObjects\Money;
use Datev\Traits\MoneyAccessorTrait;
use Psr\Log\LoggerInterface;

/**
 * Bruttobezug (Festbezug) des Arbeitnehmers.
 */
class GrossPayment extends NamedEntity {
    use MoneyAccessorTrait;

    protected int $id;

    protected float $amount;

    protected int $salary_type_id;

    protected string $payment_months;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?int {
        return $this->id ?? null;
    }

    public function getAmount(): ?Money {
        return $this->toMoney($this->amount ?? null);
    }

    public function getSalaryTypeId(): ?int {
        return $this->salary_type_id ?? null;
    }

    public function getPaymentMonths(): ?string {
        return $this->payment_months ?? null;
    }
}
