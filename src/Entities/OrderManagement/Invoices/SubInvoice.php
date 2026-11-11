<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubInvoice.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Invoices;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class SubInvoice extends NamedEntity {
    protected ?float $fees;
    protected ?float $expenses;
    protected ?float $credit_fees;
    protected ?float $credit_expenses;
    protected ?float $account_fees;
    protected ?float $account_expenses;
    protected ?float $account_expenses_tam;
    protected ?float $on_account_fees_offset;
    protected ?float $on_account_expenses_offset;
    protected ?float $advance;
    protected ?float $advance_offset;
    protected ?string $document_id;
    protected ?string $receipt_accounting_id;
    protected ?int $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?int $suborder_number;
    protected ?string $id;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getFees(): ?float {
        return $this->fees ?? null;
    }

    public function getExpenses(): ?float {
        return $this->expenses ?? null;
    }

    public function getCreditFees(): ?float {
        return $this->credit_fees ?? null;
    }

    public function getCreditExpenses(): ?float {
        return $this->credit_expenses ?? null;
    }

    public function getAccountFees(): ?float {
        return $this->account_fees ?? null;
    }

    public function getAccountExpenses(): ?float {
        return $this->account_expenses ?? null;
    }

    public function getAccountExpensesTam(): ?float {
        return $this->account_expenses_tam ?? null;
    }

    public function getOnAccountFeesOffset(): ?float {
        return $this->on_account_fees_offset ?? null;
    }

    public function getOnAccountExpensesOffset(): ?float {
        return $this->on_account_expenses_offset ?? null;
    }

    public function getAdvance(): ?float {
        return $this->advance ?? null;
    }

    public function getAdvanceOffset(): ?float {
        return $this->advance_offset ?? null;
    }

    public function getDocumentId(): ?string {
        return $this->document_id ?? null;
    }

    public function getReceiptAccountingId(): ?string {
        return $this->receipt_accounting_id ?? null;
    }

    public function getOrderId(): ?int {
        return $this->order_id ?? null;
    }

    public function getCreationYear(): ?int {
        return $this->creation_year ?? null;
    }

    public function getOrderNumber(): ?int {
        return $this->order_number ?? null;
    }

    public function getSuborderNumber(): ?int {
        return $this->suborder_number ?? null;
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }
}
