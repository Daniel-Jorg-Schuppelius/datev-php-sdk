<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class SalaryType extends NamedEntity implements IdentifiableInterface {
    protected SalaryTypeID $id;
    protected ?string $name;
    protected ?string $core;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): SalaryTypeID {
        return $this->id;
    }
}