<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Service.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingClients\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Für den Mandanten freigeschalteter Datenservice (z. B. Belegbilderservice)
 * inkl. der dafür erforderlichen OAuth2-Scopes.
 */
class Service extends NamedEntity {
    protected string $name;

    /** @var array<int, string> */
    protected array $scopes;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    /**
     * @return array<int, string>
     */
    public function getScopes(): array {
        return $this->scopes ?? [];
    }
}
