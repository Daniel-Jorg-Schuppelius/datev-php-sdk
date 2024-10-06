<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Groups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class EmployeeGroup extends NamedEntity {
    protected ?string $number;
    protected ?string $name;
    protected ?int $clearing_account_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getClearingAccountID(): ?int {
        return $this->clearing_account_id ?? null;
    }
}
