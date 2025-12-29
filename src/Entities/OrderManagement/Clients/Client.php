<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\Clients;

use APIToolkit\Entities\GUID;
use Datev\Entities\Common\Clients\Client as CommonClient;
use Psr\Log\LoggerInterface;

class Client extends CommonClient {
    protected ?string $client_number;
    protected ?string $client_name;
    protected ?GUID $organization_id;
    protected ?GUID $establishment_id;
    protected ?bool $isactive;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getClientNumber(): ?string {
        return $this->client_number ?? null;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }

    public function getOrganizationID(): ?GUID {
        return $this->organization_id ?? null;
    }

    public function getEstablishmentID(): ?GUID {
        return $this->establishment_id ?? null;
    }

    public function isActive(): ?bool {
        return $this->isactive ?? null;
    }
}
