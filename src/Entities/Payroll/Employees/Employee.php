<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\Payroll\Accounts\Account;
use Datev\Entities\Payroll\Activities\Activity;
use Datev\Entities\Payroll\Addresses\Address;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecords;
use Datev\Entities\Payroll\Data\Individual\IndividualDatum;
use Datev\Entities\Payroll\Data\Personal\PersonalDatum;
use Datev\Entities\Payroll\Disabilities\Disability;
use Datev\Entities\Payroll\EmploymentPeriods\EmploymentPeriods;
use Datev\Entities\Payroll\GrossPayments\GrossPayments;
use Datev\Entities\Payroll\HourlyWages\HourlyWages;
use Datev\Entities\Payroll\InitialActivities\InitialActivities;
use Datev\Entities\Payroll\Insurances\Private\PrivateInsurance;
use Datev\Entities\Payroll\Insurances\Social\SocialInsurance;
use Datev\Entities\Payroll\Insurances\Voluntary\VoluntaryInsurance;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecords;
use Datev\Entities\Payroll\Salaries\Salaries;
use Datev\Entities\Payroll\Taxations\Taxation;
use Datev\Entities\Payroll\Taxations\TaxCards\TaxCard;
use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlement;
use Datev\Entities\Payroll\VocationalTrainings\VocationalTrainings;
use Psr\Log\LoggerInterface;

class Employee extends NamedEntity implements IdentifiableInterface {
    protected ?EmployeeID $id;
    protected ?string $surname;
    protected ?string $first_name;
    protected ?string $company_personnel_number;
    protected ?DateTime $date_of_commencement_of_employment;
    protected ?DateTime $first_accounting_month;
    protected ?Account $account;
    protected ?Activity $activity;
    protected ?Address $address;
    protected ?CalendarRecords $calendar_records;
    protected ?Disability $disability;
    protected ?EmploymentPeriods $employment_periods;
    protected ?GrossPayments $gross_payments;
    protected ?HourlyWages $hourly_wages;
    protected ?IndividualDatum $individual_data;
    protected ?InitialActivities $initial_activities;
    protected ?MonthlyRecords $month_records;
    protected ?PersonalDatum $personal_data;
    protected ?PrivateInsurance $private_insurance;
    protected ?Salaries $salaries;
    protected ?SocialInsurance $social_insurance;
    protected ?Taxation $taxation;
    protected ?TaxCard $tax_card;
    protected ?VacationEntitlement $vacation_entitlement;
    protected ?VocationalTrainings $vocational_trainings;
    protected ?VoluntaryInsurance $voluntary_insurance;

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