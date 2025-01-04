<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Common\ConsultantNumber;
use Datev\Entities\Payroll\CostCenters\CostCenters;
use Datev\Entities\Payroll\CostUnits\CostUnits;
use Datev\Entities\Payroll\Departments\Departments;
use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployees;
use Datev\Entities\Payroll\Employees\Employees;
use Datev\Entities\Payroll\Employees\Groups\Accountings\EmployeeGroupAccountings;
use Datev\Entities\Payroll\Employees\Groups\EmployeeGroup;
use Datev\Entities\Payroll\Employees\Groups\EmployeeGroups;
use Datev\Entities\Payroll\FinancialAccountings\FinancialAccounting;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypes;
use Datev\Entities\Payroll\WorkingHours\WorkingHours;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ClientID $id;
    protected ConsultantNumber $consultant_number;
    protected int $number;
    protected string $name;
    protected ?AccountableEmployees $accountable_employees;
    protected ?CostCenters $cost_centers;
    protected ?CostUnits $cost_units;
    protected ?Departments $departments;
    protected ?EmployeeGroups $employee_group;
    protected ?EmployeeGroupAccountings $employee_group_accounting;
    protected ?Employees $employees;
    protected ?FinancialAccounting $financial_accounting;
    protected ?ReasonsForAbsence $reasons_for_absence;
    protected ?SalaryTypes $salary_types;
    protected ?WorkingHours $working_hours;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientID {
        return $this->id;
    }

    public function getNumber(): int {
        return $this->number;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getConsultantNumber(): ConsultantNumber {
        return $this->consultant_number;
    }

    public function getAccountableEmployees(): ?AccountableEmployees {
        return $this->accountable_employees ?? null;
    }

    public function getCostCenters(): ?CostCenters {
        return $this->cost_centers ?? null;
    }

    public function getCostUnits(): ?CostUnits {
        return $this->cost_units ?? null;
    }

    public function getDepartments(): ?Departments {
        return $this->departments ?? null;
    }

    public function getEmployeeGroup(): ?EmployeeGroup {
        return $this->employee_group ?? null;
    }

    public function getEmployeeGroupAccounting(): ?EmployeeGroupAccountings {
        return $this->employee_group_accounting ?? null;
    }

    public function getEmployees(): ?Employees {
        return $this->employees ?? null;
    }

    public function getFinancialAccounting(): ?FinancialAccounting {
        return $this->financial_accounting ?? null;
    }

    public function getReasonsForAbsence(): ?ReasonsForAbsence {
        return $this->reasons_for_absence ?? null;
    }

    public function getSalaryTypes(): ?SalaryTypes {
        return $this->salary_types ?? null;
    }

    public function getWorkingHours(): ?WorkingHours {
        return $this->working_hours ?? null;
    }
}
