<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualProperties;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class IndividualProperty extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?IndividualPropertyID $id;
    protected ?string $data_name;
    protected ?string $datatype;
    protected ?string $display_name;
    protected ?int $order;
    protected ?bool $referenc_item;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?IndividualPropertyID {
        return $this->id ?? null;
    }

    public function getDataName(): ?string {
        return $this->data_name ?? null;
    }

    public function getDatatype(): ?string {
        return $this->datatype ?? null;
    }

    public function getDisplayName(): ?string {
        return $this->display_name ?? null;
    }

    public function getOrder(): ?int {
        return $this->order ?? null;
    }

    public function getReferencItem(): bool {
        return $this->referenc_item ?? false;
    }
}
