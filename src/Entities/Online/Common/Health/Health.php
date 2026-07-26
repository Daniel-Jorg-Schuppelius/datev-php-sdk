<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Health.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Common\Health;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Spring-Boot-Actuator-Health-Antwort der Health-Stub-Dienste
 * (master-data:master-clients-health, my-tax:...-health).
 */
class Health extends NamedEntity {
    protected string $status;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getStatus(): ?string {
        return $this->status ?? null;
    }

    public function isUp(): bool {
        return strtoupper($this->status ?? '') === 'UP';
    }
}
