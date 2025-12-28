<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostItem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\CostItems;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class CostItem extends NamedEntity {
    protected ?CostItemID $id;
    protected ?int $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?int $suborder_id;
    protected ?int $suborder_number;
    protected ?string $suborder_name;
    protected ?bool $accounting_allowed;
    protected ?string $cost_position;
    protected ?string $cost_position_name;
    protected ?string $cost_type;
    protected ?string $fee_position;
    protected ?int $fee_plan_number;
    protected ?int $object_number;
    protected ?string $unit_description;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CostItemID {
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

    public function getSuborderId(): ?int {
        return $this->suborder_id ?? null;
    }

    public function getSuborderNumber(): ?int {
        return $this->suborder_number ?? null;
    }

    public function getSuborderName(): ?string {
        return $this->suborder_name ?? null;
    }

    public function isAccountingAllowed(): ?bool {
        return $this->accounting_allowed ?? null;
    }

    public function getCostPosition(): ?string {
        return $this->cost_position ?? null;
    }

    public function getCostPositionName(): ?string {
        return $this->cost_position_name ?? null;
    }

    public function getCostType(): ?string {
        return $this->cost_type ?? null;
    }

    public function getFeePosition(): ?string {
        return $this->fee_position ?? null;
    }

    public function getFeePlanNumber(): ?int {
        return $this->fee_plan_number ?? null;
    }

    public function getObjectNumber(): ?int {
        return $this->object_number ?? null;
    }

    public function getUnitDescription(): ?string {
        return $this->unit_description ?? null;
    }
}
