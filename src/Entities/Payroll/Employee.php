<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableInterface {
    protected EmployeeID $id;
    protected ?string $surname;
    protected ?string $first_name;
    protected ?string $company_personnel_number;
    protected ?DateTime $date_of_commencement_of_employment;
    protected ?DateTime $first_accounting_month;
    protected ?activity $activity;
    protected ?PersonalData $personal_data;
    protected ?Account $account;
    protected ?Address $address;
    protected ?GrossPayments $gross_payments;
    protected ?HourlyWages $hourly_wages;
    protected ?InitialActivities $initial_activities;
    protected ?SocialInsurance $social_insurance;
    protected ?Taxation $taxation;
    protected ?TaxCard $tax_card;
    protected ?VacationEntitlement $vacation_entitlement;
    protected ?CalendarRecords $calendar_records;
    protected ?EmploymentPeriods $employment_periods;
    protected ?PrivateInsurance $private_insurance;
    protected ?MonthRecords $month_records;
    protected ?VocationalTrainings $vocational_trainings;
    protected ?VoluntaryInsurance $voluntary_insurance;
    protected ?IndividualData $individual_data;
    protected ?Salaries $salaries;
    protected ?Disability $disability;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EmployeeID {
        return $this->id;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }
}