<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TermOfPayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class TermOfPayment extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected TermOfPaymentID $id;
    protected ?string $caption;
    protected ?int $discount_percentage_1;
    protected ?int $discount_percentage_2;
    protected ?int $discount_days_1;
    protected ?int $discount_days_2;
    protected ?int $net_days;
    protected ?string $payment_type;
    protected ?bool $is_locked;
    protected ?string $due_type;
    protected ?float $cash_discount1_percentage;
    protected ?float $cash_discount2_percentage;
    protected ?DueInDays $due_in_days;
    protected ?DueAsPeriod $due_as_period;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TermOfPaymentID {
        return $this->id;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getDiscountPercentage1(): ?int {
        return $this->discount_percentage_1 ?? null;
    }

    public function getDiscountPercentage2(): ?int {
        return $this->discount_percentage_2 ?? null;
    }

    public function getDiscountDays1(): ?int {
        return $this->discount_days_1 ?? null;
    }

    public function getDiscountDays2(): ?int {
        return $this->discount_days_2 ?? null;
    }

    public function getNetDays(): ?int {
        return $this->net_days ?? null;
    }

    public function getPaymentType(): ?string {
        return $this->payment_type ?? null;
    }

    public function isLocked(): ?bool {
        return $this->is_locked ?? null;
    }

    public function getDueType(): ?string {
        return $this->due_type ?? null;
    }

    public function getCashDiscount1Percentage(): ?float {
        return $this->cash_discount1_percentage ?? null;
    }

    public function getCashDiscount2Percentage(): ?float {
        return $this->cash_discount2_percentage ?? null;
    }

    public function getDueInDays(): ?DueInDays {
        return $this->due_in_days ?? null;
    }

    public function getDueAsPeriod(): ?DueAsPeriod {
        return $this->due_as_period ?? null;
    }
}
