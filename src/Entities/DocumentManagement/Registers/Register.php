<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Registers;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class Register extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected RegisterID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RegisterID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }
}
