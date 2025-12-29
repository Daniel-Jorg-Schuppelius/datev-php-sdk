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
use DateTime;
use Psr\Log\LoggerInterface;

class Order extends NamedEntity {
    protected ?OrderID $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?string $order_name;
    protected ?string $ordertype;
    protected ?string $ordertype_name;
    protected ?int $ordertype_group;
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

    public function getTimeCosts(): ?float {
        return $this->time_costs ?? null;
    }
}
