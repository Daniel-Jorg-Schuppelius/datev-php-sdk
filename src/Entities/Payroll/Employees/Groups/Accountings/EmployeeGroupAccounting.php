<?php
/*
 * Created on   : Sat Jan 04 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupAccounting.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees\Groups\Accountings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class EmployeeGroupAccounting extends NamedEntity {
    protected ?string $number;
    protected ?string $name;
    protected ?string $contact_person;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getContactPerson(): ?int {
        return $this->clearing_account_id ?? null;
    }
}
