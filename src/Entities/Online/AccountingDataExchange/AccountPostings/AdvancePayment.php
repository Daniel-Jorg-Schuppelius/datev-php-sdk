<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdvancePayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\AccountPostings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Anzahlungsinformationen einer Buchung.
 */
class AdvancePayment extends NamedEntity {
    protected string $euMemberState;

    protected float $euTaxRate;

    protected string $orderNumber;

    protected string $recordType;

    protected int $revenueAccount;

    protected int $taxKey;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getEuMemberState(): ?string {
        return $this->euMemberState ?? null;
    }

    public function getEuTaxRate(): ?float {
        return $this->euTaxRate ?? null;
    }

    public function getOrderNumber(): ?string {
        return $this->orderNumber ?? null;
    }

    public function getRecordType(): ?string {
        return $this->recordType ?? null;
    }

    public function getRevenueAccount(): ?int {
        return $this->revenueAccount ?? null;
    }

    public function getTaxKey(): ?int {
        return $this->taxKey ?? null;
    }
}
