<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Employees;

use DateTime;
use Datev\Entities\Common\Employees\Employee as BaseEmployee;
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

class Employee extends BaseEmployee {
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

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getDateOfCommencementOfEmployment(): ?DateTime {
        return $this->date_of_commencement_of_employment ?? null;
    }

    public function getFirstAccountingMonth(): ?DateTime {
        return $this->first_accounting_month ?? null;
    }

    public function getAccount(): ?Account {
        return $this->account ?? null;
    }

    public function getActivity(): ?Activity {
        return $this->activity ?? null;
    }

    public function getAddress(): ?Address {
        return $this->address ?? null;
    }

    public function getCalendarRecords(): ?CalendarRecords {
        return $this->calendar_records ?? null;
    }

    public function getDisability(): ?Disability {
        return $this->disability ?? null;
    }

    public function getEmploymentPeriods(): ?EmploymentPeriods {
        return $this->employment_periods ?? null;
    }

    public function getGrossPayments(): ?GrossPayments {
        return $this->gross_payments ?? null;
    }

    public function getHourlyWages(): ?HourlyWages {
        return $this->hourly_wages ?? null;
    }

    public function getIndividualData(): ?IndividualDatum {
        return $this->individual_data ?? null;
    }

    public function getInitialActivities(): ?InitialActivities {
        return $this->initial_activities ?? null;
    }

    public function getMonthRecords(): ?MonthlyRecords {
        return $this->month_records ?? null;
    }

    public function getPersonalData(): ?PersonalDatum {
        return $this->personal_data ?? null;
    }

    public function getPrivateInsurance(): ?PrivateInsurance {
        return $this->private_insurance ?? null;
    }

    public function getSalaries(): ?Salaries {
        return $this->salaries ?? null;
    }

    public function getSocialInsurance(): ?SocialInsurance {
        return $this->social_insurance ?? null;
    }

    public function getTaxation(): ?Taxation {
        return $this->taxation ?? null;
    }

    public function getTaxCard(): ?TaxCard {
        return $this->tax_card ?? null;
    }

    public function getVacationEntitlement(): ?VacationEntitlement {
        return $this->vacation_entitlement ?? null;
    }

    public function getVocationalTrainings(): ?VocationalTrainings {
        return $this->vocational_trainings ?? null;
    }

    public function getVoluntaryInsurance(): ?VoluntaryInsurance {
        return $this->voluntary_insurance ?? null;
    }
}
