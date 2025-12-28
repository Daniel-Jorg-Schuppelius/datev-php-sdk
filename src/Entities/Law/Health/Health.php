<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Health.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Health;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Health extends NamedEntity {
    protected ?string $status;
    protected ?string $version;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getStatus(): ?string {
        return $this->status ?? null;
    }

    public function getVersion(): ?string {
        return $this->version ?? null;
    }

    public function isHealthy(): bool {
        return isset($this->status) && strtolower($this->status) === 'ok';
    }
}
