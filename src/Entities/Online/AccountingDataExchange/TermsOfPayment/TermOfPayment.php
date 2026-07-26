<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TermOfPayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\TermsOfPayment;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Zahlungsbedingung eines Wirtschaftsjahres.
 */
class TermOfPayment extends NamedEntity {
    protected int $id;

    protected string $caption;

    protected string $dueType;

    protected float $cashDiscount1Percentage;

    protected float $cashDiscount2Percentage;

    protected PaymentDueInDays $paymentDueInDays;

    protected PaymentDueAsPeriod $paymentDueAsPeriod;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?int {
        return $this->id ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getDueType(): ?string {
        return $this->dueType ?? null;
    }

    public function getCashDiscount1Percentage(): ?float {
        return $this->cashDiscount1Percentage ?? null;
    }

    public function getCashDiscount2Percentage(): ?float {
        return $this->cashDiscount2Percentage ?? null;
    }

    public function getPaymentDueInDays(): ?PaymentDueInDays {
        return $this->paymentDueInDays ?? null;
    }

    public function getPaymentDueAsPeriod(): ?PaymentDueAsPeriod {
        return $this->paymentDueAsPeriod ?? null;
    }
}
