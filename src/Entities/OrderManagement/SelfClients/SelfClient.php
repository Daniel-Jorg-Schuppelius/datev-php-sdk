<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SelfClient.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\SelfClients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class SelfClient extends NamedEntity {
    protected ?SelfClientID $id;
    protected ?GUID $client_id;
    protected ?int $client_number;
    protected ?string $client_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?SelfClientID {
        return $this->id ?? null;
    }

    public function getClientId(): ?GUID {
        return $this->client_id ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }
}
