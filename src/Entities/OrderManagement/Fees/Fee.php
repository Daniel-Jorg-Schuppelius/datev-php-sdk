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
}
