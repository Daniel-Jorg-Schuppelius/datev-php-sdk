<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpensePosting.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\ExpensePostings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Datev\Entities\OrderManagement\Orders\OrderID;
use Datev\Entities\OrderManagement\Suborders\SuborderID;
use DateTime;
use Psr\Log\LoggerInterface;

class ExpensePosting extends NamedEntity {
    protected ?string $id;
    protected ?OrderID $order_id;
    protected ?SuborderID $suborder_id;
    protected ?GUID $employee_id;
    protected ?DateTime $work_date;
    protected ?DateTime $entry_date;
    protected ?string $cost_position;
    protected ?string $fee_position;
    protected ?int $object_number;
    protected ?string $comment;
    protected ?bool $isbillable;
    protected ?string $start_time;
    protected ?int $time_units;
    protected ?float $number_of_days;
    protected ?float $cost_amount;
    protected ?float $number_of_units;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getOrderID(): ?OrderID {
        return $this->order_id ?? null;
    }

    public function getSuborderID(): ?SuborderID {
        return $this->suborder_id ?? null;
    }

    public function getEmployeeID(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getWorkDate(): ?DateTime {
        return $this->work_date ?? null;
    }

    public function getCostPosition(): ?string {
        return $this->cost_position ?? null;
    }

    public function getComment(): ?string {
        return $this->comment ?? null;
    }

    public function isBillable(): ?bool {
        return $this->isbillable ?? null;
    }

    public function getTimeUnits(): ?int {
        return $this->time_units ?? null;
    }

    public function getCostAmount(): ?float {
        return $this->cost_amount ?? null;
    }
}
