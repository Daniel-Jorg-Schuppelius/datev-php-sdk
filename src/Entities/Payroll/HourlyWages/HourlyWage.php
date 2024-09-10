<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\HourlyWages;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class HourlyWage extends NamedEntity implements IdentifiableInterface {
    protected HourlyWageID $id;
    protected string $personnel_number;
    protected ?float $amount;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): HourlyWageID {
        return $this->id;
    }
}