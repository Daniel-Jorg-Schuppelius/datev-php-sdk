<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SuborderStateBilling.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\SuborderStateBilling;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class SuborderStateBilling extends NamedEntity {
    protected ?SuborderStateBillingID $id;
    protected ?int $order_id;
    protected ?int $suborder_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?int $suborder_number;
    protected ?int $accounting_year;
    protected ?int $invoice_number;
    protected ?DateTime $advance_calculation_date;
    protected ?DateTime $advance_proposal_date;
    protected ?DateTime $advance_release_date;
    protected ?DateTime $advance_billing_date;
    protected ?DateTime $advance_manual_billing_date;
    protected ?DateTime $invoice_calculation_date;
    protected ?DateTime $invoice_proposal_date;
    protected ?DateTime $invoice_release_date;
    protected ?DateTime $invoice_billing_date;
    protected ?DateTime $invoice_manual_billing_date;
    protected ?DateTime $creditnote_calculation_date;
    protected ?DateTime $creditnote_proposal_date;
    protected ?DateTime $creditnote_release_date;
    protected ?DateTime $creditnote_billing_date;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?SuborderStateBillingID {
        return $this->id ?? null;
    }

    public function getOrderId(): ?int {
        return $this->order_id ?? null;
    }

    public function getSuborderId(): ?int {
        return $this->suborder_id ?? null;
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

    public function getAccountingYear(): ?int {
        return $this->accounting_year ?? null;
    }

    public function getInvoiceNumber(): ?int {
        return $this->invoice_number ?? null;
    }

    public function getAdvanceCalculationDate(): ?DateTime {
        return $this->advance_calculation_date ?? null;
    }

    public function getAdvanceProposalDate(): ?DateTime {
        return $this->advance_proposal_date ?? null;
    }

    public function getAdvanceReleaseDate(): ?DateTime {
        return $this->advance_release_date ?? null;
    }

    public function getAdvanceBillingDate(): ?DateTime {
        return $this->advance_billing_date ?? null;
    }

    public function getAdvanceManualBillingDate(): ?DateTime {
        return $this->advance_manual_billing_date ?? null;
    }

    public function getInvoiceCalculationDate(): ?DateTime {
        return $this->invoice_calculation_date ?? null;
    }

    public function getInvoiceProposalDate(): ?DateTime {
        return $this->invoice_proposal_date ?? null;
    }

    public function getInvoiceReleaseDate(): ?DateTime {
        return $this->invoice_release_date ?? null;
    }

    public function getInvoiceBillingDate(): ?DateTime {
        return $this->invoice_billing_date ?? null;
    }

    public function getInvoiceManualBillingDate(): ?DateTime {
        return $this->invoice_manual_billing_date ?? null;
    }

    public function getCreditnoteCalculationDate(): ?DateTime {
        return $this->creditnote_calculation_date ?? null;
    }

    public function getCreditnoteProposalDate(): ?DateTime {
        return $this->creditnote_proposal_date ?? null;
    }

    public function getCreditnoteReleaseDate(): ?DateTime {
        return $this->creditnote_release_date ?? null;
    }

    public function getCreditnoteBillingDate(): ?DateTime {
        return $this->creditnote_billing_date ?? null;
    }
}
