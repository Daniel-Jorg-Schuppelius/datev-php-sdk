<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EmployeeID $id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EmployeeID {
        return $this->id;
    }
}
