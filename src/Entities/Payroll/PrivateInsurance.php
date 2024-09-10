<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class PrivateInsurance extends NamedEntity implements IdentifiableInterface {
    protected PrivateInsuranceID $id;
    protected ?bool $is_private_health_insured;
    protected ?bool $is_private_nursing_insured;
    protected ?float $monthly_premium_for_private_health_insurance;
    protected ?float $monthly_premium_for_private_nursing_insurance;
    protected ?float $monthly_contribution_to_basic_health_insurance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PrivateInsuranceID {
        return $this->id;
    }
}