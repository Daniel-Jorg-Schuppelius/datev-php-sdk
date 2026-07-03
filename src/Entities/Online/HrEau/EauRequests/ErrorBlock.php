<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ErrorBlock.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fehlerblock einer eAU-Rückmeldung.
 */
class ErrorBlock extends NamedEntity {
    protected string $origin;

    protected string $error_number;

    protected string $error_text;

    protected string $error_value;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getOrigin(): ?string {
        return $this->origin ?? null;
    }

    public function getErrorNumber(): ?string {
        return $this->error_number ?? null;
    }

    public function getErrorText(): ?string {
        return $this->error_text ?? null;
    }

    public function getErrorValue(): ?string {
        return $this->error_value ?? null;
    }
}
