<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmploymentPeriod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Beschäftigungszeitraum (Ein-/Austritt).
 */
class EmploymentPeriod extends NamedEntity {
    protected string $date_of_commencement_of_employment;

    protected string $date_of_termination_of_employment;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDateOfCommencementOfEmployment(): ?string {
        return $this->date_of_commencement_of_employment ?? null;
    }

    public function getDateOfTerminationOfEmployment(): ?string {
        return $this->date_of_termination_of_employment ?? null;
    }
}
