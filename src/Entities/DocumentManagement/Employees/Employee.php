<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Common\EmployeeID;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableNamedEntityInterface {
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
