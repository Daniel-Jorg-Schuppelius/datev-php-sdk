<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class AccountableEmployees extends NamedEntity implements IdentifiableInterface {
    protected ?ClientID $id;
    protected ?string $surname;
    protected ?string $first_name;
    protected ?string $company_personnel_number;
    protected ?DateTime $date_of_commencement_of_employment;
    protected ?DateTime $date_of_termination_of_employment;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientID {
        return $this->id;
    }
}