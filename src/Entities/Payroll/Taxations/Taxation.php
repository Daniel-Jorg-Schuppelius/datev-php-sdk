<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Taxation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Taxations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Taxation extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected TaxationID $id;
    protected ?string $tax_identification_number;
    protected ?string $employment_type;
    protected ?float $requested_annual_allowance;
    protected ?bool $is_two_percent_flat_rate_taxation;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TaxationID {
        return $this->id;
    }

    public function getTaxIdentificationNumber(): ?string {
        return $this->tax_identification_number ?? null;
    }

    public function getEmploymentType(): ?string {
        return $this->employment_type ?? null;
    }

    public function getRequestedAnnualAllowance(): ?float {
        return $this->requested_annual_allowance ?? null;
    }

    public function getIsTwoPercentFlatRateTaxation(): ?bool {
        return $this->is_two_percent_flat_rate_taxation ?? null;
    }
}
