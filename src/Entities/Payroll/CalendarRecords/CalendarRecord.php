<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\CalendarRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class CalendarRecord extends NamedEntity implements IdentifiableInterface {
    protected ?CalendarRecordID $id;
    protected ?string $personnel_number;
    protected ?DateTime $date_of_emergence;
    protected ?DateTime $accounting_month;
    protected ?string $reason_for_absence_id;
    protected ?int $salary_type_id;
    protected ?float $hours;
    protected ?float $days;
    protected ?float $differing_factor;
    protected ?float $differing_pay_change;
    protected ?string $cost_center_id;
    protected ?string $cost_unit_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CalendarRecordID {
        return $this->id;
    }
}