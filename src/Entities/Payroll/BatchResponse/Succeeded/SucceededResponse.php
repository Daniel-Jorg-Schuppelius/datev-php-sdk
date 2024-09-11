<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\BatchResponse\Succeeded;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class SucceededResponse extends NamedEntity implements IdentifiableInterface {
    protected ?int $index;
    protected ?CreatedID $created_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?CreatedID {
        return $this->created_id["id"] ?? null;
    }
}
