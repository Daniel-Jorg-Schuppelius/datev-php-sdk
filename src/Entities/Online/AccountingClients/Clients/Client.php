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

namespace Datev\Entities\Online\AccountingClients\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Psr\Log\LoggerInterface;

/**
 * Mandant des accounting-clients-Dienstes.
 *
 * Die id ist die technische Verbundnummer "Beraternummer-Mandantennummer"
 * (z. B. "29098-55003"), keine GUID.
 */
class Client extends NamedEntity {
    protected string $id;

    protected int $client_number;

    protected int $consultant_number;

    protected string $name;

    protected Services $services;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getConsultantNumber(): ?int {
        return $this->consultant_number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getServices(): ?Services {
        return $this->services ?? null;
    }

    /**
     * Verbundnummer als Value-Object (aus id bzw. Berater-/Mandantennummer).
     */
    public function getConsultantClientNumber(): ?ConsultantClientNumber {
        if (isset($this->consultant_number, $this->client_number)) {
            return new ConsultantClientNumber($this->consultant_number, $this->client_number);
        }

        if (isset($this->id)) {
            return ConsultantClientNumber::fromString($this->id);
        }

        return null;
    }
}
