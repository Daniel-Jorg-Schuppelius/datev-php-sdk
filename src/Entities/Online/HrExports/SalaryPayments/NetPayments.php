<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NetPayments.php
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
 * Nettobezug/-abzug.
 */
class NetPayments extends NamedEntity {
    use MoneyAccessorTrait;

    protected string $net_payment_number;

    protected string $net_payment_name;

    protected float $net_payment_amount;

    protected float $net_payment_amount_difference;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getNetPaymentNumber(): ?string {
        return $this->net_payment_number ?? null;
    }

    public function getNetPaymentName(): ?string {
        return $this->net_payment_name ?? null;
    }

    public function getNetPaymentAmount(): ?Money {
        return $this->toMoney($this->net_payment_amount ?? null);
    }

    public function getNetPaymentAmountDifference(): ?Money {
        return $this->toMoney($this->net_payment_amount_difference ?? null);
    }
}
