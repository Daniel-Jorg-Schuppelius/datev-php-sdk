<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthlyValue.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\MonthlyValues;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class MonthlyValue extends NamedEntity {
    protected ?MonthlyValueID $id;
    protected ?int $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?string $order_name;
    protected ?string $ordertype;
    protected ?string $ordertype_group;
    protected ?int $year;
    protected ?int $month;
    protected ?GUID $client_id;
    protected ?GUID $organization_id;
    protected ?GUID $establishment_id;
    protected ?GUID $functional_area_id;
    protected ?bool $isinternal;
    protected ?float $total_hours;
    protected ?float $total_hours_not_invoiced;
    protected ?float $time_costs;
    protected ?float $time_costs_not_invoiced;
    protected ?float $material_costs;
    protected ?float $material_costs_not_invoiced;
    protected ?float $expenses_costs;
    protected ?float $expenses_costs_not_invoiced;
    protected ?float $external_costs;
    protected ?float $external_costs_not_invoiced;
    protected ?float $total_costs;
    protected ?float $total_costs_not_invoiced;
    protected ?float $total_turnover;
    protected ?float $fees;
    protected ?float $expenses;
    protected ?float $credit_fees;
    protected ?float $credit_expenses;
    protected ?float $credit_amount;
    protected ?float $on_account_fees_offset;
    protected ?float $on_account_expenses_offset;
    protected ?float $on_account_amount_offset;
    protected ?float $contribution_margin;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?MonthlyValueID {
        return $this->id ?? null;
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

    public function getOrderName(): ?string {
        return $this->order_name ?? null;
    }

    public function getOrdertype(): ?string {
        return $this->ordertype ?? null;
    }

    public function getOrdertypeGroup(): ?string {
        return $this->ordertype_group ?? null;
    }

    public function getYear(): ?int {
        return $this->year ?? null;
    }

    public function getMonth(): ?int {
        return $this->month ?? null;
    }

    public function getClientId(): ?GUID {
        return $this->client_id ?? null;
    }

    public function getOrganizationId(): ?GUID {
        return $this->organization_id ?? null;
    }

    public function getEstablishmentId(): ?GUID {
        return $this->establishment_id ?? null;
    }

    public function getFunctionalAreaId(): ?GUID {
        return $this->functional_area_id ?? null;
    }

    public function isInternal(): ?bool {
        return $this->isinternal ?? null;
    }

    public function getTotalHours(): ?float {
        return $this->total_hours ?? null;
    }

    public function getTotalHoursNotInvoiced(): ?float {
        return $this->total_hours_not_invoiced ?? null;
    }

    public function getTimeCosts(): ?float {
        return $this->time_costs ?? null;
    }

    public function getTimeCostsNotInvoiced(): ?float {
        return $this->time_costs_not_invoiced ?? null;
    }

    public function getMaterialCosts(): ?float {
        return $this->material_costs ?? null;
    }

    public function getMaterialCostsNotInvoiced(): ?float {
        return $this->material_costs_not_invoiced ?? null;
    }

    public function getExpensesCosts(): ?float {
        return $this->expenses_costs ?? null;
    }

    public function getExpensesCostsNotInvoiced(): ?float {
        return $this->expenses_costs_not_invoiced ?? null;
    }

    public function getExternalCosts(): ?float {
        return $this->external_costs ?? null;
    }

    public function getExternalCostsNotInvoiced(): ?float {
        return $this->external_costs_not_invoiced ?? null;
    }

    public function getTotalCosts(): ?float {
        return $this->total_costs ?? null;
    }

    public function getTotalCostsNotInvoiced(): ?float {
        return $this->total_costs_not_invoiced ?? null;
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

    public function getCreditAmount(): ?float {
        return $this->credit_amount ?? null;
    }

    public function getOnAccountFeesOffset(): ?float {
        return $this->on_account_fees_offset ?? null;
    }

    public function getOnAccountExpensesOffset(): ?float {
        return $this->on_account_expenses_offset ?? null;
    }

    public function getOnAccountAmountOffset(): ?float {
        return $this->on_account_amount_offset ?? null;
    }

    public function getContributionMargin(): ?float {
        return $this->contribution_margin ?? null;
    }
}
