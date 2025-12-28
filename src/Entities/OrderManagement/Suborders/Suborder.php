<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Suborder.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Suborders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\OrderManagement\Orders\OrderID;
use DateTime;
use Psr\Log\LoggerInterface;

class Suborder extends NamedEntity {
    protected ?SuborderID $suborder_id;
    protected ?OrderID $order_id;
    protected ?int $suborder_number;
    protected ?string $suborder_name;
    protected ?DateTime $planned_start;
    protected ?DateTime $planned_end;
    protected ?float $planned_hours_time_units;
    protected ?DateTime $date_started;
    protected ?DateTime $date_work_completed;
    protected ?DateTime $date_invoiced;
    protected ?float $total_hours;
    protected ?float $time_costs;
    protected ?float $material_costs;
    protected ?float $expenses_costs;
    protected ?float $external_costs;
    protected ?bool $accounting_allowed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?SuborderID {
        return $this->suborder_id ?? null;
    }

    public function getOrderID(): ?OrderID {
        return $this->order_id ?? null;
    }

    public function getSuborderNumber(): ?int {
        return $this->suborder_number ?? null;
    }

    public function getSuborderName(): ?string {
        return $this->suborder_name ?? null;
    }

    public function getPlannedStart(): ?DateTime {
        return $this->planned_start ?? null;
    }

    public function getPlannedEnd(): ?DateTime {
        return $this->planned_end ?? null;
    }

    public function getTotalHours(): ?float {
        return $this->total_hours ?? null;
    }

    public function isAccountingAllowed(): ?bool {
        return $this->accounting_allowed ?? null;
    }
}
