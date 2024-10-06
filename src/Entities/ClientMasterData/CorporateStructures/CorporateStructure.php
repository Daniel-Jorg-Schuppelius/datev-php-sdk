<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CorporateStructures;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\Establishments\Establishments;
use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalAreas;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class CorporateStructure extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CorporateStructureID $id;
    protected ?string $name;
    protected ?int $number;
    protected ?Status $status;
    protected ?DateTime $timestamp;
    protected ?Establishments $establishments;
    protected ?FunctionalAreas $functional_areas;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CorporateStructureID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }

    public function getEstablishments(): ?Establishments {
        return $this->establishments ?? null;
    }

    public function getFunctionalAreas(): ?FunctionalAreas {
        return $this->functional_areas ?? null;
    }
}
