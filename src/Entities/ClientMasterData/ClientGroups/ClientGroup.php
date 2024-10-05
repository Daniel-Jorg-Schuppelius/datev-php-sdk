<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientGroups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ID\ClientGroupTypeID;
use Datev\Entities\ClientMasterData\Clients\ID\ClientID;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class ClientGroup extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ClientGroupID $id;
    protected ?ClientGroupTypeID $client_group_type_id;
    protected ?string $client_group_type_short_name;
    protected ClientID $client_id;
    protected ?string $client_name;
    protected ?int $client_number;
    protected ?Status $client_status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientGroupID {
        return $this->id;
    }
}
