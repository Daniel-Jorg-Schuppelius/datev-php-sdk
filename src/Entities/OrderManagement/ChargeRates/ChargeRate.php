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
}
