<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeQualification.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\EmployeesQualification;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Psr\Log\LoggerInterface;

class EmployeeQualification extends NamedEntity {
    protected ?EmployeeQualificationID $id;
    protected ?GUID $employee_id;
    protected ?int $employee_number;
    protected ?int $qualification_id;
    protected ?int $qualification_category;
    protected ?string $qualification_abbreviation;
    protected ?string $qualification_short_name;
    protected ?string $qualification_long_name;
    protected ?DateTime $qualification_date_from;
    protected ?DateTime $qualification_date_to;
    protected ?bool $employee_associate;
    protected ?bool $employee_qualified;
    protected ?bool $qualification_active;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?EmployeeQualificationID {
        return $this->id ?? null;
    }

    public function getEmployeeId(): ?GUID {
        return $this->employee_id ?? null;
    }

    public function getEmployeeNumber(): ?int {
        return $this->employee_number ?? null;
    }

    public function getQualificationId(): ?int {
        return $this->qualification_id ?? null;
    }

    public function getQualificationCategory(): ?int {
        return $this->qualification_category ?? null;
    }

    public function getQualificationAbbreviation(): ?string {
        return $this->qualification_abbreviation ?? null;
    }

    public function getQualificationShortName(): ?string {
        return $this->qualification_short_name ?? null;
    }

    public function getQualificationLongName(): ?string {
        return $this->qualification_long_name ?? null;
    }

    public function getQualificationDateFrom(): ?DateTime {
        return $this->qualification_date_from ?? null;
    }

    public function getQualificationDateTo(): ?DateTime {
        return $this->qualification_date_to ?? null;
    }

    public function isEmployeeAssociate(): ?bool {
        return $this->employee_associate ?? null;
    }

    public function isEmployeeQualified(): ?bool {
        return $this->employee_qualified ?? null;
    }

    public function isQualificationActive(): ?bool {
        return $this->qualification_active ?? null;
    }
}
