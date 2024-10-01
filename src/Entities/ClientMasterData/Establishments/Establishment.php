<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Establishments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\ShortNames\ShortName;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Establishment extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EstablishmentID $id;
    protected ?string $name;
    protected ?ShortName $short_name;
    protected ?Status $status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EstablishmentID {
        return $this->id;
    }
}
