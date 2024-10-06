<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VacationEntitlement.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\VacationEntitlements;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class VacationEntitlement extends NamedEntity implements IdentifiableNamedEntityInterface {
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

    public function getBasicVacationEntitlement(): ?float {
        return $this->basic_vacation_entitlement ?? null;
    }

    public function getCurrentYearVacationEntitlement(): ?float {
        return $this->current_year_vacation_entitlement ?? null;
    }

    public function getRemainingDaysOfVacationPreviousYear(): ?float {
        return $this->remaining_days_of_vacation_previous_year ?? null;
    }
}
