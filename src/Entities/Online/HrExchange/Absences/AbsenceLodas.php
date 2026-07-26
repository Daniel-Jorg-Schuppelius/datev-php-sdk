<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AbsenceLodas.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Absences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fehlzeit für LODAS.
 */
class AbsenceLodas extends NamedEntity {
    protected int $personnel_number;

    protected string $absence_start_date;

    protected string $absence_end_date;

    protected int $reason_for_absence;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getAbsenceStartDate(): ?string {
        return $this->absence_start_date ?? null;
    }

    public function getAbsenceEndDate(): ?string {
        return $this->absence_end_date ?? null;
    }

    public function getReasonForAbsence(): ?int {
        return $this->reason_for_absence ?? null;
    }
}
