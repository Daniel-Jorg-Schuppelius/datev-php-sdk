<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems;

use Datev\Entities\DocumentManagement\Documents\DocumentLink;
use Datev\Enums\StructureItemType;
use Psr\Log\LoggerInterface;

class StructureItem extends BaseStructureItem {
    protected string $name;
    protected ?int $counter;
    protected ?int $size;
    protected StructureItemType $type;
    protected ?int $parent_counter;
    protected ?DocumentLink $document_link;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCounter(): ?int {
        return $this->counter ?? null;
    }

    public function getType(): StructureItemType {
        return $this->type;
    }

    public function getParentCounter(): ?int {
        return $this->parent_counter ?? null;
    }

    public function getDocumentLink(): ?DocumentLink {
        return $this->document_link ?? null;
    }
}
