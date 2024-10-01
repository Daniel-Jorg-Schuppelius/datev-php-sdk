<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\AreaOfResponsibilities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class AreaOfResponsibility extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AreaOfResponsibilityID $id;
    protected ?string $name;
    protected ?string $description;
    protected ?bool $standard;
    protected ?Status $status;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AreaOfResponsibilityID {
        return $this->id;
    }
}
