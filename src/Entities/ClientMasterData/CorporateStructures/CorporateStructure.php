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
}
