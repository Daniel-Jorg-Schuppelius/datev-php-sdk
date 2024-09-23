<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\CostCenters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class CostCenter extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected CostCenterID $id;
    protected string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostCenterID {
        return $this->id;
    }
}
