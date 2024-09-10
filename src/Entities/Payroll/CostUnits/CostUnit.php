<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\CostUnits;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class CostUnit extends NamedEntity implements IdentifiableInterface {
    protected CostUnitID $id;
    protected string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostUnitID {
        return $this->id;
    }
}