<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderStateWork.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\OrderStateWork;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class OrderStateWork extends NamedEntity {
    protected ?OrderStateWorkID $id;
    protected ?int $order_id;
    protected ?int $creation_year;
    protected ?int $order_number;
    protected ?DateTime $creation_date;
    protected ?GUID $creation_employee_id;
    protected ?DateTime $start_date;
    protected ?GUID $start_employee_id;
    protected ?DateTime $done_date;
    protected ?GUID $done_employee_id;
    protected ?DateTime $interruption_date;
    protected ?GUID $interruption_employee_id;
    protected ?DateTime $resume_date;
    protected ?GUID $resume_employee_id;
    protected ?DateTime $completion_date;
    protected ?GUID $completion_employee_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?OrderStateWorkID {
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

    public function getCreationDate(): ?DateTime {
        return $this->creation_date ?? null;
    }

    public function getCreationEmployeeId(): ?GUID {
        return $this->creation_employee_id ?? null;
    }

    public function getStartDate(): ?DateTime {
        return $this->start_date ?? null;
    }

    public function getStartEmployeeId(): ?GUID {
        return $this->start_employee_id ?? null;
    }

    public function getDoneDate(): ?DateTime {
        return $this->done_date ?? null;
    }

    public function getDoneEmployeeId(): ?GUID {
        return $this->done_employee_id ?? null;
    }

    public function getInterruptionDate(): ?DateTime {
        return $this->interruption_date ?? null;
    }

    public function getInterruptionEmployeeId(): ?GUID {
        return $this->interruption_employee_id ?? null;
    }

    public function getResumeDate(): ?DateTime {
        return $this->resume_date ?? null;
    }

    public function getResumeEmployeeId(): ?GUID {
        return $this->resume_employee_id ?? null;
    }

    public function getCompletionDate(): ?DateTime {
        return $this->completion_date ?? null;
    }

    public function getCompletionEmployeeId(): ?GUID {
        return $this->completion_employee_id ?? null;
    }
}
