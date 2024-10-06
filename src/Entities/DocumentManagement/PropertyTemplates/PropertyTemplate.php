<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\PropertyTemplates;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClass;
use Psr\Log\LoggerInterface;

class PropertyTemplate extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?PropertyTemplateID $id;
    protected ?string $name;
    protected ?DocumentClass $document_class;
    protected ?string $supplement;
    protected ?int $inbox_document_type_number;
    protected ?int $outbox_document_type_number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PropertyTemplateID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getDocumentClass(): ?DocumentClass {
        return $this->document_class ?? null;
    }

    public function getSupplement(): ?string {
        return $this->supplement ?? null;
    }

    public function getInboxDocumentTypeNumber(): ?int {
        return $this->inbox_document_type_number ?? null;
    }

    public function getOutboxDocumentTypeNumber(): ?int {
        return $this->outbox_document_type_number ?? null;
    }
}
