<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EmployeeID $id;
    protected ?int $employee_number;
    protected ?string $display_name;
    protected ?string $surname;
    protected ?string $forename;
    protected ?string $email;
    protected ?string $phone;
    protected ?bool $active;
    protected ?array $functions;
    protected ?array $job_titles;
    protected ?string $branch;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeID {
        return $this->id ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getForename(): ?string {
        return $this->forename ?? null;
    }

    public function getEmail(): ?string {
        return $this->email ?? null;
    }

    public function getPhone(): ?string {
        return $this->phone ?? null;
    }

    public function isActive(): ?bool {
        return $this->active ?? null;
    }

    public function getFunctions(): ?array {
        return $this->functions ?? null;
    }

    public function getJobTitles(): ?array {
        return $this->job_titles ?? null;
    }

    public function getBranch(): ?string {
        return $this->branch ?? null;
    }
}
