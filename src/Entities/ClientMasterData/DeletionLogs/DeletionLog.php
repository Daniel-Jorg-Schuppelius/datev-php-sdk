<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\DeletionLogs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class DeletionLog extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?DeletionLogID $id;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DeletionLogID {
        return $this->id;
    }
}
