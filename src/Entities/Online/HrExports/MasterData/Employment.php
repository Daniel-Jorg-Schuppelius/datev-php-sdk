<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Beschäftigungsdaten des Arbeitnehmers.
 */
class Employment extends NamedEntity {
    protected string $date_of_joining;

    protected string $date_of_leaving;

    protected string $initial_date_of_joining;

    protected string $job_title;

    protected string $job_title_of_occupational_classification_code;

    protected string $occupational_classification_code;

    protected string $occupational_classification_code_employee_leasing;

    protected string $sequential_number_of_occupational_classification_code;

    protected string $type_of_contract;

    protected float $weekly_working_hours;

    protected CostCenter $cost_center;

    protected string $highest_level_of_education;

    protected string $highest_level_of_professional_training;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDateOfJoining(): ?string {
        return $this->date_of_joining ?? null;
    }

    public function getDateOfLeaving(): ?string {
        return $this->date_of_leaving ?? null;
    }

    public function getInitialDateOfJoining(): ?string {
        return $this->initial_date_of_joining ?? null;
    }

    public function getJobTitle(): ?string {
        return $this->job_title ?? null;
    }

    public function getJobTitleOfOccupationalClassificationCode(): ?string {
        return $this->job_title_of_occupational_classification_code ?? null;
    }

    public function getOccupationalClassificationCode(): ?string {
        return $this->occupational_classification_code ?? null;
    }

    public function getOccupationalClassificationCodeEmployeeLeasing(): ?string {
        return $this->occupational_classification_code_employee_leasing ?? null;
    }

    public function getSequentialNumberOfOccupationalClassificationCode(): ?string {
        return $this->sequential_number_of_occupational_classification_code ?? null;
    }

    public function getTypeOfContract(): ?string {
        return $this->type_of_contract ?? null;
    }

    public function getWeeklyWorkingHours(): ?float {
        return $this->weekly_working_hours ?? null;
    }

    public function getCostCenter(): ?CostCenter {
        return $this->cost_center ?? null;
    }

    public function getHighestLevelOfEducation(): ?string {
        return $this->highest_level_of_education ?? null;
    }

    public function getHighestLevelOfProfessionalTraining(): ?string {
        return $this->highest_level_of_professional_training ?? null;
    }
}
