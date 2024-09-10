<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\ConsultantNumber;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableInterface {
    protected ClientID $id;
    protected int $number;
    protected ConsultantNumber $consultant_number;
    protected string $name;
    protected ?Employees $employees;
    protected ?AccountableEmployees $accountable_employees;
    protected ?EmployeeGroup $employee_group;
    protected ?WorkingHours $working_hours;
    protected ?SalaryTypes $salary_types;
    protected ?CostCenters $cost_centers;
    protected ?CostUnits $cost_units;
    protected ?Departments $departments;
    protected ?FinancialAccountings $financial_accounting;
    protected ?ReasonsForAbsence $reasons_for_absence;

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