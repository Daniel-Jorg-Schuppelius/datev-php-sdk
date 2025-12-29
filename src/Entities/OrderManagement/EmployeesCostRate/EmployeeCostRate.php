<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCostRate.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\EmployeesCostRate;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class EmployeeCostRate extends NamedEntity {
    protected ?EmployeeCostRateID $id;
    protected ?GUID $employee_id;
    protected ?int $employee_number;
    protected ?int $cost_rate_number;
    protected ?DateTime $cost_rate_date_from;
    protected ?DateTime $cost_rate_date_to;
    protected ?float $cost_rate_1;
    protected ?float $cost_rate_2;
    protected ?float $cost_rate_3;
    protected ?float $cost_rate_4;
    protected ?float $cost_rate_5;
    protected ?float $cost_rate_6;
    protected ?float $cost_rate_7;
    protected ?float $cost_rate_8;
    protected ?float $cost_rate_9;
    protected ?float $internal_charge_rate_internalorders;
    protected ?float $internal_charge_rate_clientorders;
    protected ?bool $cost_rate_active;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeCostRateID {
        return $this->id ?? null;
    }

    public function getEmployeeId(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getCostRateNumber(): ?int {
        return $this->cost_rate_number ?? null;
    }

    public function getCostRateDateFrom(): ?DateTime {
        return $this->cost_rate_date_from ?? null;
    }

    public function getCostRateDateTo(): ?DateTime {
        return $this->cost_rate_date_to ?? null;
    }

    public function getCostRate1(): ?float {
        return $this->cost_rate_1 ?? null;
    }

    public function getCostRate2(): ?float {
        return $this->cost_rate_2 ?? null;
    }

    public function getCostRate3(): ?float {
        return $this->cost_rate_3 ?? null;
    }

    public function getCostRate4(): ?float {
        return $this->cost_rate_4 ?? null;
    }

    public function getCostRate5(): ?float {
        return $this->cost_rate_5 ?? null;
    }

    public function getCostRate6(): ?float {
        return $this->cost_rate_6 ?? null;
    }

    public function getCostRate7(): ?float {
        return $this->cost_rate_7 ?? null;
    }

    public function getCostRate8(): ?float {
        return $this->cost_rate_8 ?? null;
    }

    public function getCostRate9(): ?float {
        return $this->cost_rate_9 ?? null;
    }

    public function getInternalChargeRateInternalOrders(): ?float {
        return $this->internal_charge_rate_internalorders ?? null;
    }

    public function getInternalChargeRateClientOrders(): ?float {
        return $this->internal_charge_rate_clientorders ?? null;
    }

    public function isCostRateActive(): ?bool {
        return $this->cost_rate_active ?? null;
    }
}
