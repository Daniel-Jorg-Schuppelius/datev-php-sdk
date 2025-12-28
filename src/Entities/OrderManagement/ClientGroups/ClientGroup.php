<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroup.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\ClientGroups;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class ClientGroup extends NamedEntity {
    protected ?GUID $id;
    protected ?GUID $client_id;
    protected ?string $client_number;
    protected ?string $client_name;
    protected ?GUID $group_id;
    protected ?string $group_number;
    protected ?string $group_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?GUID {
        return $this->id ?? null;
    }

    public function getClientID(): ?GUID {
        return $this->client_id ?? null;
    }

    public function getClientNumber(): ?string {
        return $this->client_number ?? null;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }

    public function getGroupID(): ?GUID {
        return $this->group_id ?? null;
    }

    public function getGroupNumber(): ?string {
        return $this->group_number ?? null;
    }

    public function getGroupName(): ?string {
        return $this->group_name ?? null;
    }
}
