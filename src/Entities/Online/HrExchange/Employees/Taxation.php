<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Taxation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Besteuerungsdaten des Arbeitnehmers.
 */
class Taxation extends NamedEntity {
    protected int $employment_type;

    protected int $requested_annual_allowance;

    protected string $tax_identification_number;

    protected int $flat_rate_tax;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getEmploymentType(): ?int {
        return $this->employment_type ?? null;
    }

    public function getRequestedAnnualAllowance(): ?int {
        return $this->requested_annual_allowance ?? null;
    }

    public function getTaxIdentificationNumber(): ?string {
        return $this->tax_identification_number ?? null;
    }

    public function getFlatRateTax(): ?int {
        return $this->flat_rate_tax ?? null;
    }
}
