<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientGroupTypes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class ClientGroupType extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ClientGroupTypeID $id;
    protected ?string $name;
    protected ?string $note;
    protected string $short_name;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientGroupTypeID {
        return $this->id;
    }
}
