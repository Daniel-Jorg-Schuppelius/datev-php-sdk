<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Folders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartner;
use Datev\Entities\DocumentManagement\Registers\Registers;
use Psr\Log\LoggerInterface;

class Folder extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected FolderID $id;
    protected ?string $name;
    protected ?Registers $registers;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): FolderID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getRegisters(): ?Registers {
        return $this->registers ?? null;
    }
}
