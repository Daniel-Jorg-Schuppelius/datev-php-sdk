<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AbsenceLug.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Absences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Fehlzeit für Lohn und Gehalt (LuG).
 */
class AbsenceLug extends NamedEntity {
    protected string $id;

    protected int $personnel_number;

    protected string $date_of_emergence;

    protected string $reason_for_absence;

    protected int $salary_type_id;

    protected float $hours;

    protected float $days;

    protected float $differing_factor;

    protected float $differing_pay_change;

    protected string $cost_center_id;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getDateOfEmergence(): ?string {
        return $this->date_of_emergence ?? null;
    }

    public function getReasonForAbsence(): ?string {
        return $this->reason_for_absence ?? null;
    }

    public function getSalaryTypeId(): ?int {
        return $this->salary_type_id ?? null;
    }

    public function getHours(): ?float {
        return $this->hours ?? null;
    }

    public function getDays(): ?float {
        return $this->days ?? null;
    }

    public function getDifferingFactor(): ?float {
        return $this->differing_factor ?? null;
    }

    public function getDifferingPayChange(): ?float {
        return $this->differing_pay_change ?? null;
    }

    public function getCostCenterId(): ?string {
        return $this->cost_center_id ?? null;
    }
}
