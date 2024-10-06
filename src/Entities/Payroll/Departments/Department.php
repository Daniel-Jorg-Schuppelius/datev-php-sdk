<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Departments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Department extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DepartmentID $id;
    protected ?string $name;
    protected ?string $contact_person;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DepartmentID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getContactPerson(): ?string {
        return $this->contact_person ?? null;
    }
}
