<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Expense.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Expenses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class Expense extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ExpenseID $id;
    protected ?string $object_type;
    protected ?string $case_handler_id;
    protected ?string $case_handler_link;
    protected ?string $expense_type_id;
    protected ?string $expense_type_link;
    protected ?DateTime $start;
    protected ?DateTime $end;
    protected ?float $unit_value;
    protected ?string $billed;
    protected ?string $invoice_id;
    protected ?string $invoice_key;
    protected ?string $internal_note;
    protected ?string $note;
    protected ?string $creator_id;
    protected ?string $creator_link;
    protected ?string $modifier_id;
    protected ?string $modifier_link;
    protected ?string $file_id;
    protected ?string $file_link;
    protected ?string $client_id;
    protected ?string $client_link;
    protected ?float $unit_rate;
    protected ?float $amount;
    protected ?string $currency;
    protected ?bool $billable;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?ExpenseID {
        return $this->id ?? null;
    }

    public function getObjectType(): ?string {
        return $this->object_type ?? null;
    }

    public function getCaseHandlerId(): ?string {
        return $this->case_handler_id ?? null;
    }

    public function getCaseHandlerLink(): ?string {
        return $this->case_handler_link ?? null;
    }

    public function getExpenseTypeId(): ?string {
        return $this->expense_type_id ?? null;
    }

    public function getExpenseTypeLink(): ?string {
        return $this->expense_type_link ?? null;
    }

    public function getStart(): ?DateTime {
        return $this->start ?? null;
    }

    public function getEnd(): ?DateTime {
        return $this->end ?? null;
    }

    public function getUnitValue(): ?float {
        return $this->unit_value ?? null;
    }

    public function getBilled(): ?string {
        return $this->billed ?? null;
    }

    public function getInvoiceId(): ?string {
        return $this->invoice_id ?? null;
    }

    public function getInvoiceKey(): ?string {
        return $this->invoice_key ?? null;
    }

    public function getInternalNote(): ?string {
        return $this->internal_note ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getCreatorId(): ?string {
        return $this->creator_id ?? null;
    }

    public function getCreatorLink(): ?string {
        return $this->creator_link ?? null;
    }

    public function getModifierId(): ?string {
        return $this->modifier_id ?? null;
    }

    public function getModifierLink(): ?string {
        return $this->modifier_link ?? null;
    }

    public function getFileId(): ?string {
        return $this->file_id ?? null;
    }

    public function getFileLink(): ?string {
        return $this->file_link ?? null;
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getClientLink(): ?string {
        return $this->client_link ?? null;
    }

    public function getUnitRate(): ?float {
        return $this->unit_rate ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getCurrency(): ?string {
        return $this->currency ?? null;
    }

    public function isBillable(): ?bool {
        return $this->billable ?? null;
    }
}
