<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualProperties;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class IndividualProperty extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?IndividualPropertyID $id;
    protected ?string $data_name;
    protected ?string $data_type;
    protected ?string $display_name;
    protected ?int $order;
    protected ?bool $active;
    protected ?bool $reference_item;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?IndividualPropertyID {
        return $this->id ?? null;
    }

    public function getDataName(): ?string {
        return $this->data_name ?? null;
    }

    public function getDataType(): ?string {
        return $this->data_type ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getOrder(): ?int {
        return $this->order ?? null;
    }

    public function isActive(): bool {
        return $this->active ?? false;
    }

    public function isReferenceItem(): bool {
        return $this->reference_item ?? false;
    }
}
