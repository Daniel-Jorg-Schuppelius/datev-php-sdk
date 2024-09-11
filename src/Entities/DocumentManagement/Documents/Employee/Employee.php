<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Employee;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\EmployeeID;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableInterface {
    protected ?EmployeeID $id;
    protected ?string $name;
    protected ?bool $is_active;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EmployeeID {
        return $this->id;
    }
}
