<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSequence.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\AccountingSequences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\DataExchangeRecordType;
use Psr\Log\LoggerInterface;

/**
 * Buchungsstapel/-lauf eines Wirtschaftsjahres.
 */
class AccountingSequence extends NamedEntity {
    protected int $accountingSequenceId;

    protected string $accountingSequenceNumber;

    protected string $dateFrom;

    protected string $dateTo;

    protected string $description;

    protected string $initials;

    protected string $inspectionStatus;

    protected string $markOfOrigin;

    protected bool $isCommitted;

    protected DataExchangeRecordType $recordType;

    protected string $accountingReason;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountingSequenceId(): ?int {
        return $this->accountingSequenceId ?? null;
    }

    public function getAccountingSequenceNumber(): ?string {
        return $this->accountingSequenceNumber ?? null;
    }

    public function getDateFrom(): ?string {
        return $this->dateFrom ?? null;
    }

    public function getDateTo(): ?string {
        return $this->dateTo ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getInitials(): ?string {
        return $this->initials ?? null;
    }

    public function getInspectionStatus(): ?string {
        return $this->inspectionStatus ?? null;
    }

    public function getMarkOfOrigin(): ?string {
        return $this->markOfOrigin ?? null;
    }

    public function isCommitted(): bool {
        return $this->isCommitted ?? false;
    }

    public function getRecordType(): ?DataExchangeRecordType {
        return $this->recordType ?? null;
    }

    public function getAccountingReason(): ?string {
        return $this->accountingReason ?? null;
    }
}
