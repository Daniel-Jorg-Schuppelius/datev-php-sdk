<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimBulk.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\ServiceProvider;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class ScimBulk extends NamedEntity {
    protected bool $supported;
    protected ?int $max_operations;
    protected ?int $max_payload_size;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function isSupported(): bool {
        return $this->supported;
    }

    public function getMaxOperations(): ?int {
        return $this->max_operations ?? null;
    }

    public function getMaxPayloadSize(): ?int {
        return $this->max_payload_size ?? null;
    }
}
