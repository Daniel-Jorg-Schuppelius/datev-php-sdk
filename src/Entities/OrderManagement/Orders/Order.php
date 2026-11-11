<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Order.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Orders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use APIToolkit\Traits\MoneyAccessorTrait;
use CommonToolkit\ValueObjects\Money;
use DateTime;
use Datev\Entities\OrderManagement\Suborders\Suborders;
use Psr\Log\LoggerInterface;

class Order extends NamedEntity {
    use MoneyAccessorTrait;

    protected ?OrderID $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?string $order_name;
    protected ?string $ordertype;
    protected ?string $ordertype_name;
    protected ?string $ordertype_group;
    protected ?string $ordertype_group_name;
    protected ?GUID $client_id;
    protected ?string $client_name;
    protected ?string $client_number;
    protected ?GUID $organization_id;
    protected ?GUID $establishment_id;
    protected ?string $functional_area_id;
    protected ?string $completion_status;
    protected ?string $billing_status;
    protected ?bool $isinternal;
    protected ?int $assessment_year;
    protected ?int $fiscal_year;
    protected ?string $file_number;
    protected ?DateTime $planned_start;
    protected ?DateTime $planned_end;
    protected ?float $planned_turnover;
    protected ?float $planned_hours_time_units;
    protected ?float $planned_time_costs;
    protected ?float $planned_expenses_costs;
    protected ?float $planned_material_costs;
    protected ?float $planned_external_costs;
    protected ?float $total_hours;
    protected ?float $total_hours_not_invoiced;
    protected ?float $time_costs;
    protected ?float $material_costs;
    protected ?float $expenses_costs;
    protected ?float $external_costs;
    protected ?GUID $order_responsible1_id;
    protected ?GUID $order_responsible2_id;
    protected ?GUID $order_partner_id;
    protected ?int $id;
    protected ?int $creation_year_predecessor;
    protected ?int $order_number_predecessor;
    protected ?int $creation_year_successor;
    protected ?int $order_number_successor;
    protected ?string $cost_center;
    protected ?string $cost_center_name;
    protected ?string $client_responsible_id;
    protected ?string $file_id;
    protected ?DateTime $date_completion_status;
    protected ?DateTime $date_billing_status;
    protected ?DateTime $completion_date;
    protected ?DateTime $interruption_date;
    protected ?DateTime $resume_date;
    protected ?string $order_structure;
    protected ?DateTime $min_planned_start;
    protected ?DateTime $max_planned_end;
    protected ?float $planned_hours;
    protected ?bool $automatic_fee_active;
    protected ?float $automatic_fee_level;
    protected ?string $invoice_type;
    protected ?Suborders $suborders;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?OrderID {
        return $this->order_id ?? null;
    }

    public function getCreationYear(): ?int {
        return $this->creation_year ?? null;
    }

    public function getOrderNumber(): ?int {
        return $this->order_number ?? null;
    }

    public function getOrderName(): ?string {
        return $this->order_name ?? null;
    }

    public function getOrderType(): ?string {
        return $this->ordertype ?? null;
    }

    public function getClientID(): ?GUID {
        return $this->client_id ?? null;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }

    public function getCompletionStatus(): ?string {
        return $this->completion_status ?? null;
    }

    public function getBillingStatus(): ?string {
        return $this->billing_status ?? null;
    }

    public function isInternal(): ?bool {
        return $this->isinternal ?? null;
    }

    public function getTotalHours(): ?float {
        return $this->total_hours ?? null;
    }

    public function getTimeCosts(): ?Money {
        return $this->toMoney($this->time_costs ?? null);
    }

    public function getCreationYearPredecessor(): ?int {
        return $this->creation_year_predecessor ?? null;
    }

    public function getOrderNumberPredecessor(): ?int {
        return $this->order_number_predecessor ?? null;
    }

    public function getCreationYearSuccessor(): ?int {
        return $this->creation_year_successor ?? null;
    }

    public function getOrderNumberSuccessor(): ?int {
        return $this->order_number_successor ?? null;
    }

    public function getCostCenter(): ?string {
        return $this->cost_center ?? null;
    }

    public function getCostCenterName(): ?string {
        return $this->cost_center_name ?? null;
    }

    public function getClientResponsibleId(): ?string {
        return $this->client_responsible_id ?? null;
    }

    public function getFileId(): ?string {
        return $this->file_id ?? null;
    }

    public function getDateCompletionStatus(): ?DateTime {
        return $this->date_completion_status ?? null;
    }

    public function getDateBillingStatus(): ?DateTime {
        return $this->date_billing_status ?? null;
    }

    public function getCompletionDate(): ?DateTime {
        return $this->completion_date ?? null;
    }

    public function getInterruptionDate(): ?DateTime {
        return $this->interruption_date ?? null;
    }

    public function getResumeDate(): ?DateTime {
        return $this->resume_date ?? null;
    }

    public function getOrderStructure(): ?string {
        return $this->order_structure ?? null;
    }

    public function getMinPlannedStart(): ?DateTime {
        return $this->min_planned_start ?? null;
    }

    public function getMaxPlannedEnd(): ?DateTime {
        return $this->max_planned_end ?? null;
    }

    public function getPlannedHours(): ?float {
        return $this->planned_hours ?? null;
    }

    public function isAutomaticFeeActive(): ?bool {
        return $this->automatic_fee_active ?? null;
    }

    public function getAutomaticFeeLevel(): ?float {
        return $this->automatic_fee_level ?? null;
    }

    public function getInvoiceType(): ?string {
        return $this->invoice_type ?? null;
    }

    public function getSuborders(): ?Suborders {
        return $this->suborders ?? null;
    }
}
