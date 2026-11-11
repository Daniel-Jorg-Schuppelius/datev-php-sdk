<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Fee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Fees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Fee extends NamedEntity {
    protected ?int $id;
    protected ?string $fee_position;
    protected ?string $fee_position_name;
    protected ?int $fee_plan_number;
    protected ?string $fee_plan_name;
    protected ?float $factor_from;
    protected ?float $factor_to;
    protected ?float $default_factor;
    protected ?int $order_id;
    protected ?int $suborder_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?int $suborder_number;
    protected ?int $object_number;
    protected ?string $fee_short_name;
    protected ?string $position_type;
    protected ?string $billing_type;
    protected ?float $amount;
    protected ?float $unit_rate;
    protected ?float $unit;
    protected ?float $value;
    protected ?int $charge_rate_number;
    protected ?int $time_units;
    protected ?string $state;
    protected ?float $rate;
    protected ?int $denominator;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getFeePosition(): ?string {
        return $this->fee_position ?? null;
    }

    public function getFeePositionName(): ?string {
        return $this->fee_position_name ?? null;
    }

    public function getFeePlanNumber(): ?int {
        return $this->fee_plan_number ?? null;
    }

    public function getFeePlanName(): ?string {
        return $this->fee_plan_name ?? null;
    }

    public function getDefaultFactor(): ?float {
        return $this->default_factor ?? null;
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

    public function getObjectNumber(): ?int {
        return $this->object_number ?? null;
    }

    public function getFeeShortName(): ?string {
        return $this->fee_short_name ?? null;
    }

    public function getPositionType(): ?string {
        return $this->position_type ?? null;
    }

    public function getBillingType(): ?string {
        return $this->billing_type ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getUnitRate(): ?float {
        return $this->unit_rate ?? null;
    }

    public function getUnit(): ?float {
        return $this->unit ?? null;
    }

    public function getValue(): ?float {
        return $this->value ?? null;
    }

    public function getChargeRateNumber(): ?int {
        return $this->charge_rate_number ?? null;
    }

    public function getTimeUnits(): ?int {
        return $this->time_units ?? null;
    }

    public function getState(): ?string {
        return $this->state ?? null;
    }

    public function getRate(): ?float {
        return $this->rate ?? null;
    }

    public function getDenominator(): ?int {
        return $this->denominator ?? null;
    }
}
