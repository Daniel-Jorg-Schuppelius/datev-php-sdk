<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AffectedElement.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Common\Errors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Von einem Fehler betroffenes Element (RFC-7807-Erweiterung der DATEV-Dienste).
 */
class AffectedElement extends NamedEntity {
    protected string $name;

    protected string $reason;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getReason(): ?string {
        return $this->reason ?? null;
    }
}
