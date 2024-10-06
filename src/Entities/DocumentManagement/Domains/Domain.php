<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Domains;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartner;
use Datev\Entities\DocumentManagement\Folders\Folder;
use Datev\Entities\DocumentManagement\Folders\Folders;
use Psr\Log\LoggerInterface;

class Domain extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DomainID $id;
    protected ?CorrespondencePartner $correspondence_partner;
    protected ?Folders $folders;
    protected ?bool $is_selected;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DomainID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getCorrespondencePartner(): ?CorrespondencePartner {
        return $this->correspondence_partner ?? null;
    }

    public function getFolders(): ?Folders {
        return $this->folders ?? null;
    }

    public function isSelected(): bool {
        return $this->is_selected ?? false;
    }
}
