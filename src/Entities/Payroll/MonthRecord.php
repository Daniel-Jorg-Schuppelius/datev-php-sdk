<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class MonthRecord extends NamedEntity implements IdentifiableInterface {
    protected MonthRecordID $id;
    protected ?string $personnel_number;
    protected ?DateTime $month_of_emergence;
    protected ?string $salary_type_id;
    protected ?string $cost_center_id;
    protected ?int $cost_unit_id;
    protected ?float $value;
    protected ?float $differing_factor;
    protected ?float $differing_pay_change;
    protected ?string $origin;
    protected ?DateTime $accounting_month;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): MonthRecordID {
        return $this->id;
    }
}
