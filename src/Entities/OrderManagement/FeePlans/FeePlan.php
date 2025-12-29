<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeePlan.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\FeePlans;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class FeePlan extends NamedEntity {
    protected ?FeePlanID $id;
    protected ?int $fee_plan_number;
    protected ?string $fee_plan_name;
    protected ?DateTime $fee_plan_date_from;
    protected ?DateTime $fee_plan_date_to;
    protected ?bool $fee_plan_active;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?FeePlanID {
        return $this->id ?? null;
    }

    public function getFeePlanNumber(): ?int {
        return $this->fee_plan_number ?? null;
    }

    public function getFeePlanName(): ?string {
        return $this->fee_plan_name ?? null;
    }

    public function getFeePlanDateFrom(): ?DateTime {
        return $this->fee_plan_date_from ?? null;
    }

    public function getFeePlanDateTo(): ?DateTime {
        return $this->fee_plan_date_to ?? null;
    }

    public function isFeePlanActive(): ?bool {
        return $this->fee_plan_active ?? null;
    }
}
