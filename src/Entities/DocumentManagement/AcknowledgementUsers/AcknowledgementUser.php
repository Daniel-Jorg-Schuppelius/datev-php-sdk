<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\AcknowledgementUsers;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class AcknowledgementUser extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected AcknowledgementUserID $id;
    protected ?string $name;
    protected ?DateTime $removed_acknowledgement;
    protected ?DateTime $acknowledged;
    protected ?bool $is_deleted;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AcknowledgementUserID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getRemovedAcknowledgement(): ?DateTime {
        return $this->removed_acknowledgement ?? null;
    }

    public function getAcknowledged(): ?DateTime {
        return $this->acknowledged ?? null;
    }

    public function isDeleted(): bool {
        return $this->is_deleted ?? false;
    }
}
