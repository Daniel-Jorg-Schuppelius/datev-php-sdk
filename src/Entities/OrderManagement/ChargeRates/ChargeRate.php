<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ChargeRate.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\ChargeRates;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class ChargeRate extends NamedEntity {
    protected ?GUID $id;
    protected ?GUID $employee_id;
    protected ?DateTime $valid_from;
    protected ?float $charge_rate_1;
    protected ?float $charge_rate_2;
    protected ?float $charge_rate_3;
    protected ?float $charge_rate_4;
    protected ?float $charge_rate_5;
    protected ?float $charge_rate_6;
    protected ?float $charge_rate_7;
    protected ?float $charge_rate_8;
    protected ?float $charge_rate_9;
    protected ?int $charge_rate_number;
    protected ?int $employee_number;
    protected ?string $organization_id;
    protected ?int $qualification_id;
    protected ?DateTime $charge_rate_date_from;
    protected ?DateTime $charge_rate_date_to;
    protected ?string $client_id;
    protected ?int $client_group;
    protected ?string $client_group_type_id;
    protected ?string $order_type;
    protected ?int $order_type_group_id;
    protected ?string $cost_position;
    protected ?int $order_id;
    protected ?int $order_creation_year;
    protected ?int $order_number;
    protected ?float $charge_rate_hour;
    protected ?float $charge_rate_day;
    protected ?bool $charge_rate_active;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?GUID {
        return $this->id ?? null;
    }

    public function getEmployeeID(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getChargeRate1(): ?float {
        return $this->charge_rate_1 ?? null;
    }

    public function getChargeRate2(): ?float {
        return $this->charge_rate_2 ?? null;
    }

    public function getChargeRateNumber(): ?int {
        return $this->charge_rate_number ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getOrganizationId(): ?string {
        return $this->organization_id ?? null;
    }

    public function getQualificationId(): ?int {
        return $this->qualification_id ?? null;
    }

    public function getChargeRateDateFrom(): ?DateTime {
        return $this->charge_rate_date_from ?? null;
    }

    public function getChargeRateDateTo(): ?DateTime {
        return $this->charge_rate_date_to ?? null;
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getClientGroup(): ?int {
        return $this->client_group ?? null;
    }

    public function getClientGroupTypeId(): ?string {
        return $this->client_group_type_id ?? null;
    }

    public function getOrderType(): ?string {
        return $this->order_type ?? null;
    }

    public function getOrderTypeGroupId(): ?int {
        return $this->order_type_group_id ?? null;
    }

    public function getCostPosition(): ?string {
        return $this->cost_position ?? null;
    }

    public function getOrderId(): ?int {
        return $this->order_id ?? null;
    }

    public function getOrderCreationYear(): ?int {
        return $this->order_creation_year ?? null;
    }

    public function getOrderNumber(): ?int {
        return $this->order_number ?? null;
    }

    public function getChargeRateHour(): ?float {
        return $this->charge_rate_hour ?? null;
    }

    public function getChargeRateDay(): ?float {
        return $this->charge_rate_day ?? null;
    }

    public function isChargeRateActive(): ?bool {
        return $this->charge_rate_active ?? null;
    }
}
