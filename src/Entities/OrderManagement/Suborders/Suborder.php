<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Suborder.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Suborders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\OrderManagement\Orders\OrderID;
use Psr\Log\LoggerInterface;

class Suborder extends NamedEntity {
    protected ?SuborderID $suborder_id;
    protected ?OrderID $order_id;
    protected ?int $suborder_number;
    protected ?string $suborder_name;
    protected ?DateTime $planned_start;
    protected ?DateTime $planned_end;
    protected ?float $planned_hours_time_units;
    protected ?DateTime $date_started;
    protected ?DateTime $date_work_completed;
    protected ?DateTime $date_invoiced;
    protected ?float $total_hours;
    protected ?float $time_costs;
    protected ?float $material_costs;
    protected ?float $expenses_costs;
    protected ?float $external_costs;
    protected ?bool $accounting_allowed;
    protected ?int $calculated_cost_rate_id;
    protected ?float $total_hours_not_invoiced;
    protected ?float $planned_hours;
    protected ?float $time_costs_not_invoiced;
    protected ?float $material_costs_not_invoiced;
    protected ?float $expenses_costs_not_invoiced;
    protected ?float $external_costs_not_invoiced;
    protected ?float $total_turnover;
    protected ?float $fees;
    protected ?float $expenses;
    protected ?float $credit_fees;
    protected ?float $credit_expenses;
    protected ?float $on_account_fees_offset;
    protected ?float $on_account_expenses_offset;
    protected ?float $advance;
    protected ?float $advance_received;
    protected ?float $advance_offset;
    protected ?DateTime $date_work_started;
    protected ?DateTime $min_planned_start;
    protected ?DateTime $max_planned_end;
    protected ?DateTime $period_from;
    protected ?DateTime $period_to;
    protected ?DateTime $date_of_invoice;
    protected ?DateTime $document_date;
    protected ?int $accounting_year;
    protected ?int $invoice_number;
    protected ?DateTime $date_of_invoice_manually;
    protected ?DateTime $date_advance_invoiced;
    protected ?DateTime $advance_invoice_date;
    protected ?DateTime $advance_document_date;
    protected ?int $advance_accounting_year;
    protected ?int $advance_invoice_number;
    protected ?DateTime $date_credit_invoiced;
    protected ?DateTime $credit_invoice_date;
    protected ?DateTime $credit_document_date;
    protected ?int $credit_accounting_year;
    protected ?int $credit_invoice_number;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?SuborderID {
        return $this->suborder_id ?? null;
    }

    public function getOrderID(): ?OrderID {
        return $this->order_id ?? null;
    }

    public function getSuborderNumber(): ?int {
        return $this->suborder_number ?? null;
    }

    public function getSuborderName(): ?string {
        return $this->suborder_name ?? null;
    }

    public function getPlannedStart(): ?DateTime {
        return $this->planned_start ?? null;
    }

    public function getPlannedEnd(): ?DateTime {
        return $this->planned_end ?? null;
    }

    public function getTotalHours(): ?float {
        return $this->total_hours ?? null;
    }

    public function isAccountingAllowed(): ?bool {
        return $this->accounting_allowed ?? null;
    }

    public function getCalculatedCostRateId(): ?int {
        return $this->calculated_cost_rate_id ?? null;
    }

    public function getTotalHoursNotInvoiced(): ?float {
        return $this->total_hours_not_invoiced ?? null;
    }

    public function getPlannedHours(): ?float {
        return $this->planned_hours ?? null;
    }

    public function getTimeCostsNotInvoiced(): ?float {
        return $this->time_costs_not_invoiced ?? null;
    }

    public function getMaterialCostsNotInvoiced(): ?float {
        return $this->material_costs_not_invoiced ?? null;
    }

    public function getExpensesCostsNotInvoiced(): ?float {
        return $this->expenses_costs_not_invoiced ?? null;
    }

    public function getExternalCostsNotInvoiced(): ?float {
        return $this->external_costs_not_invoiced ?? null;
    }

    public function getTotalTurnover(): ?float {
        return $this->total_turnover ?? null;
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

    public function getOnAccountFeesOffset(): ?float {
        return $this->on_account_fees_offset ?? null;
    }

    public function getOnAccountExpensesOffset(): ?float {
        return $this->on_account_expenses_offset ?? null;
    }

    public function getAdvance(): ?float {
        return $this->advance ?? null;
    }

    public function getAdvanceReceived(): ?float {
        return $this->advance_received ?? null;
    }

    public function getAdvanceOffset(): ?float {
        return $this->advance_offset ?? null;
    }

    public function getDateWorkStarted(): ?DateTime {
        return $this->date_work_started ?? null;
    }

    public function getMinPlannedStart(): ?DateTime {
        return $this->min_planned_start ?? null;
    }

    public function getMaxPlannedEnd(): ?DateTime {
        return $this->max_planned_end ?? null;
    }

    public function getPeriodFrom(): ?DateTime {
        return $this->period_from ?? null;
    }

    public function getPeriodTo(): ?DateTime {
        return $this->period_to ?? null;
    }

    public function getDateOfInvoice(): ?DateTime {
        return $this->date_of_invoice ?? null;
    }

    public function getDocumentDate(): ?DateTime {
        return $this->document_date ?? null;
    }

    public function getAccountingYear(): ?int {
        return $this->accounting_year ?? null;
    }

    public function getInvoiceNumber(): ?int {
        return $this->invoice_number ?? null;
    }

    public function getDateOfInvoiceManually(): ?DateTime {
        return $this->date_of_invoice_manually ?? null;
    }

    public function getDateAdvanceInvoiced(): ?DateTime {
        return $this->date_advance_invoiced ?? null;
    }

    public function getAdvanceInvoiceDate(): ?DateTime {
        return $this->advance_invoice_date ?? null;
    }

    public function getAdvanceDocumentDate(): ?DateTime {
        return $this->advance_document_date ?? null;
    }

    public function getAdvanceAccountingYear(): ?int {
        return $this->advance_accounting_year ?? null;
    }

    public function getAdvanceInvoiceNumber(): ?int {
        return $this->advance_invoice_number ?? null;
    }

    public function getDateCreditInvoiced(): ?DateTime {
        return $this->date_credit_invoiced ?? null;
    }

    public function getCreditInvoiceDate(): ?DateTime {
        return $this->credit_invoice_date ?? null;
    }

    public function getCreditDocumentDate(): ?DateTime {
        return $this->credit_document_date ?? null;
    }

    public function getCreditAccountingYear(): ?int {
        return $this->credit_accounting_year ?? null;
    }

    public function getCreditInvoiceNumber(): ?int {
        return $this->credit_invoice_number ?? null;
    }
}
