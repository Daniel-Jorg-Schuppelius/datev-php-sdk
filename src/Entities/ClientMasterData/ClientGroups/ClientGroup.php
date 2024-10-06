<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroup.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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

    public function getClientGroupTypeID(): ?ClientGroupTypeID {
        return $this->client_group_type_id ?? null;
    }

    public function getClientGroupTypeShortName(): ?string {
        return $this->client_group_type_short_name ?? null;
    }

    public function getClientID(): ClientID {
        return $this->client_id;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getClientStatus(): ?Status {
        return $this->client_status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
