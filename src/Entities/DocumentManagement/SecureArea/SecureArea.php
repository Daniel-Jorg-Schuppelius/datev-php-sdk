<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\SecureAreas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClasses;
use Psr\Log\LoggerInterface;

class SecureArea extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected SecureAreaID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): SecureAreaID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
