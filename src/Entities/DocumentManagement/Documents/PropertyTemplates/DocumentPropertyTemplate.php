<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\PropertyTemplates;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentPropertyTemplate extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DocumentPropertyTemplateID $id;
    protected ?string $name;
    protected ?string $supplement;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentPropertyTemplateID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getSupplement(): ?string {
        return $this->supplement ?? null;
    }
}
