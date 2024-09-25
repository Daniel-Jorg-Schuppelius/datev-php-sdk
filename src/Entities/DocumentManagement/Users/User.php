<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class User extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected UserID $id;
    protected ?string $name;
    protected ?bool $is_deleted;
    protected ?bool $is_user_group;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): UserID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function isDeleted(): bool {
        return $this->is_deleted ?? false;
    }

    public function isUserGroup(): bool {
        return $this->is_user_group ?? false;
    }
}