<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostAccountingRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use DateTime;
use Datev\Enums\DebitCredit;
use Psr\Log\LoggerInterface;

class CostAccountingRecord extends NamedEntity implements IdentifiableNamedEntityInterface {
    use MoneyAccessorTrait;

    protected ?CostAccountingRecordID $id;
    protected ?float $amount;
    protected ?string $cost_center;
    protected ?string $contra_cost_center;
    protected ?DateTime $date;
    protected ?string $posting_description;
    protected ?int $record_number;
    protected ?int $account_number;
    protected ?string $alternative_cost_center;
    protected ?int $contra_account_number;
    protected ?DebitCredit $debit_credit_identifier;
    protected ?string $document_field1;
    protected ?string $document_field2;
    protected ?DateTime $kost_date;
    protected ?float $kost_quantity;
    protected ?string $text;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CostAccountingRecordID {
        return $this->id ?? null;
    }

    public function getAmount(): ?Money {
        return $this->toMoney($this->amount ?? null);
    }

    public function getCostCenter(): ?string {
        return $this->cost_center ?? null;
    }

    public function getContraCostCenter(): ?string {
        return $this->contra_cost_center ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getPostingDescription(): ?string {
        return $this->posting_description ?? null;
    }

    public function getRecordNumber(): ?int {
        return $this->record_number ?? null;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getAlternativeCostCenter(): ?string {
        return $this->alternative_cost_center ?? null;
    }

    public function getContraAccountNumber(): ?int {
        return $this->contra_account_number ?? null;
    }

    public function getDebitCreditIdentifier(): ?DebitCredit {
        return $this->debit_credit_identifier ?? null;
    }

    public function getDocumentField1(): ?string {
        return $this->document_field1 ?? null;
    }

    public function getDocumentField2(): ?string {
        return $this->document_field2 ?? null;
    }

    public function getKostDate(): ?DateTime {
        return $this->kost_date ?? null;
    }

    public function getKostQuantity(): ?float {
        return $this->kost_quantity ?? null;
    }

    public function getText(): ?string {
        return $this->text ?? null;
    }
}
