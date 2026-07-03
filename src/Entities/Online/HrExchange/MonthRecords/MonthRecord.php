<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\MonthRecords;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Monats-Bewegungsdatensatz.
 */
class MonthRecord extends NamedEntity {
    protected int $personnel_number;

    protected float $value;

    protected int $salary_type_id;

    protected float $differing_factor;

    protected string $cost_center_id;

    protected string $month_of_emergence;

    protected int $processing_code;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getValue(): ?float {
        return $this->value ?? null;
    }

    public function getSalaryTypeId(): ?int {
        return $this->salary_type_id ?? null;
    }

    public function getDifferingFactor(): ?float {
        return $this->differing_factor ?? null;
    }

    public function getCostCenterId(): ?string {
        return $this->cost_center_id ?? null;
    }

    public function getMonthOfEmergence(): ?string {
        return $this->month_of_emergence ?? null;
    }

    public function getProcessingCode(): ?int {
        return $this->processing_code ?? null;
    }
}
