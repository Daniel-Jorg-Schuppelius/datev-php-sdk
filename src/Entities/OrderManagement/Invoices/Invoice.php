<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Invoice.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Invoices;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class Invoice extends NamedEntity {
    protected ?int $id;
    protected ?InvoiceID $invoice_id;
    protected ?int $accounting_year;
    protected ?int $invoice_number;
    protected ?DateTime $date_of_invoice;
    protected ?DateTime $document_date;
    protected ?DateTime $performance_date;
    protected ?float $gross_amount;
    protected ?float $net_amount;
    protected ?float $vat_amount;
    protected ?float $fees;
    protected ?float $expenses;
    protected ?float $advance;
    protected ?GUID $organization_id;
    protected ?GUID $establishment_id;
    protected ?GUID $client_id;
    protected ?string $origin_flag;
    protected ?string $invoice_type;
    protected ?bool $cancellation_flag;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getInvoiceID(): ?InvoiceID {
        return $this->invoice_id ?? null;
    }

    public function getAccountingYear(): ?int {
        return $this->accounting_year ?? null;
    }

    public function getInvoiceNumber(): ?int {
        return $this->invoice_number ?? null;
    }

    public function getDateOfInvoice(): ?DateTime {
        return $this->date_of_invoice ?? null;
    }

    public function getGrossAmount(): ?float {
        return $this->gross_amount ?? null;
    }

    public function getNetAmount(): ?float {
        return $this->net_amount ?? null;
    }

    public function getVatAmount(): ?float {
        return $this->vat_amount ?? null;
    }

    public function getClientID(): ?GUID {
        return $this->client_id ?? null;
    }

    public function getInvoiceType(): ?string {
        return $this->invoice_type ?? null;
    }

    public function isCancellation(): ?bool {
        return $this->cancellation_flag ?? null;
    }
}
