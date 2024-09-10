<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\ConsultantNumber;
use Datev\Entities\Payroll\CostCenters\CostCenters;
use Datev\Entities\Payroll\CostUnits\CostUnits;
use Datev\Entities\Payroll\Departments\Departments;
use Datev\Entities\Payroll\EmployeeGroups\EmployeeGroup;
use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployees;
use Datev\Entities\Payroll\Employees\Employees;
use Datev\Entities\Payroll\FinancialAccountings\FinancialAccountings;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use Datev\Entities\Payroll\Salaries\SalaryTypes\SalaryTypes;
use Datev\Entities\Payroll\WorkingHours\WorkingHours;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableInterface {
    protected ClientID $id;
    protected ConsultantNumber $consultant_number;
    protected int $number;
    protected string $name;
    protected ?AccountableEmployees $accountable_employees;
    protected ?CostCenters $cost_centers;
    protected ?CostUnits $cost_units;
    protected ?Departments $departments;
    protected ?EmployeeGroup $employee_group;
    protected ?Employees $employees;
    protected ?FinancialAccountings $financial_accounting;
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
}