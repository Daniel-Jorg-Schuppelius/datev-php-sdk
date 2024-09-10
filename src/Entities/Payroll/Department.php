<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Department extends NamedEntity implements IdentifiableInterface {
    protected DepartmentID $id;
    protected ?string $name;
    protected ?string $contact_person;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DepartmentID {
        return $this->id;
    }
}
