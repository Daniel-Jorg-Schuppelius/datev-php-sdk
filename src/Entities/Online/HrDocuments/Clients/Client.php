<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrDocuments\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Mandant des Datenservice Dokumente Personalwirtschaft.
 */
class Client extends NamedEntity {
    protected string $client_guid;

    protected int $consultant_number;

    protected int $client_number;

    protected string $name;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getClientGuid(): ?string {
        return $this->client_guid ?? null;
    }

    public function getConsultantNumber(): ?int {
        return $this->consultant_number ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
