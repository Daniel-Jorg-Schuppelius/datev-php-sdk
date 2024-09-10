<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\VacationEntitlements;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class VacationEntitlement extends NamedEntity implements IdentifiableInterface {
    protected VacationEntitlementID $id;
    protected ?float $basic_vacation_entitlement;
    protected ?float $current_year_vacation_entitlement;
    protected ?float $remaining_days_of_vacation_previous_year;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VacationEntitlementID {
        return $this->id;
    }
}