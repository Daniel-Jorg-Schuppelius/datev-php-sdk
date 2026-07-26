<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VocationalTraining.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Berufsausbildungsdaten des Arbeitnehmers.
 */
class VocationalTraining extends NamedEntity {
    protected int $personnel_number;

    protected string $start;

    protected string $expected_end;

    protected string $actual_end;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getStart(): ?string {
        return $this->start ?? null;
    }

    public function getExpectedEnd(): ?string {
        return $this->expected_end ?? null;
    }

    public function getActualEnd(): ?string {
        return $this->actual_end ?? null;
    }
}
