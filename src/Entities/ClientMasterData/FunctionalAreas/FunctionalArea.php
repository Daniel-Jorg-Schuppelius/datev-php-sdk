<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FunctionalAreas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\ShortNames\ShortName;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class FunctionalArea extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?FunctionalAreaID $id;
    protected ?string $name;
    protected ?ShortName $short_name;
    protected ?Status $status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): FunctionalAreaID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getShortName(): ?ShortName {
        return $this->short_name ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
