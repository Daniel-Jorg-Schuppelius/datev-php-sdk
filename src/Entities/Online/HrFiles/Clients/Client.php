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

namespace Datev\Entities\Online\HrFiles\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Psr\Log\LoggerInterface;

/**
 * Mandant des hr:files-Dienstes; die client_id ist die Verbundnummer
 * "Beraternummer-Mandantennummer" (z. B. "1234567-12345").
 */
class Client extends NamedEntity {
    protected string $client_id;

    protected int $consultant_number;

    protected int $client_number;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getConsultantNumber(): ?int {
        return $this->consultant_number ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getConsultantClientNumber(): ?ConsultantClientNumber {
        if (isset($this->consultant_number, $this->client_number)) {
            return new ConsultantClientNumber($this->consultant_number, $this->client_number);
        }

        if (isset($this->client_id)) {
            return ConsultantClientNumber::fromString($this->client_id);
        }

        return null;
    }
}
