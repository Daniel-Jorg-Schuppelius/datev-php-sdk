<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IncapacityForWork.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Arbeitsunfähigkeitsdaten der Krankenkassen-Rückmeldung.
 */
class IncapacityForWork extends NamedEntity {
    protected string $start_work_incapacity_employer;

    protected string $start_work_incapacity_au;

    protected string $end_work_incapacity_au;

    protected string $actual_end_work_incapacity_au;

    protected string $date_of_diagnosis;

    protected int $flag_current_work_incapacity;

    protected bool $accident_at_work;

    protected bool $assignment_accident_insurance_doctor;

    protected bool $other_accident;

    protected string $start_hospitalisation;

    protected string $end_hospitalisation;

    protected bool $initial_certificate;

    protected string $automatic_feedback_until;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getStartWorkIncapacityEmployer(): ?string {
        return $this->start_work_incapacity_employer ?? null;
    }

    public function getStartWorkIncapacityAu(): ?string {
        return $this->start_work_incapacity_au ?? null;
    }

    public function getEndWorkIncapacityAu(): ?string {
        return $this->end_work_incapacity_au ?? null;
    }

    public function getActualEndWorkIncapacityAu(): ?string {
        return $this->actual_end_work_incapacity_au ?? null;
    }

    public function getDateOfDiagnosis(): ?string {
        return $this->date_of_diagnosis ?? null;
    }

    public function getFlagCurrentWorkIncapacity(): ?int {
        return $this->flag_current_work_incapacity ?? null;
    }

    public function isAccidentAtWork(): bool {
        return $this->accident_at_work ?? false;
    }

    public function isAssignmentAccidentInsuranceDoctor(): bool {
        return $this->assignment_accident_insurance_doctor ?? false;
    }

    public function isOtherAccident(): bool {
        return $this->other_accident ?? false;
    }

    public function getStartHospitalisation(): ?string {
        return $this->start_hospitalisation ?? null;
    }

    public function getEndHospitalisation(): ?string {
        return $this->end_hospitalisation ?? null;
    }

    public function isInitialCertificate(): bool {
        return $this->initial_certificate ?? false;
    }

    public function getAutomaticFeedbackUntil(): ?string {
        return $this->automatic_feedback_until ?? null;
    }
}
