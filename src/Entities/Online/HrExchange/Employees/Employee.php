<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Employee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Arbeitnehmer-Aggregat des hr:exchange-Dienstes (Schreib- und Lesemodell).
 */
class Employee extends NamedEntity {
    protected string $surname;

    protected string $client_id;

    protected int $personnel_number;

    protected string $company_personnel_number;

    protected string $first_name;

    protected string $employment_id;

    protected int $business_unit_id;

    protected string $payment_method;

    protected string $date_of_instant_registration;

    protected string $instant_registration_uuid;

    protected Activity $activity;

    protected Account $account;

    protected Address $address;

    protected EmploymentPeriods $employment_periods;

    protected GrossPayments $gross_payments;

    protected HourlyWages $hourly_wages;

    protected IndividualData $individual_data;

    protected PersonalData $personal_data;

    protected SocialInsurance $social_insurance;

    protected TaxCard $tax_card;

    protected Taxation $taxation;

    protected VacationEntitlement $vacation_entitlement;

    protected VocationalTraining $vocational_training;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getPersonnelNumber(): ?int {
        return $this->personnel_number ?? null;
    }

    public function getCompanyPersonnelNumber(): ?string {
        return $this->company_personnel_number ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getEmploymentId(): ?string {
        return $this->employment_id ?? null;
    }

    public function getBusinessUnitId(): ?int {
        return $this->business_unit_id ?? null;
    }

    public function getPaymentMethod(): ?string {
        return $this->payment_method ?? null;
    }

    public function getDateOfInstantRegistration(): ?string {
        return $this->date_of_instant_registration ?? null;
    }

    public function getInstantRegistrationUuid(): ?string {
        return $this->instant_registration_uuid ?? null;
    }

    public function getActivity(): ?Activity {
        return $this->activity ?? null;
    }

    public function getAccount(): ?Account {
        return $this->account ?? null;
    }

    public function getAddress(): ?Address {
        return $this->address ?? null;
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

    public function getIndividualData(): ?IndividualData {
        return $this->individual_data ?? null;
    }

    public function getPersonalData(): ?PersonalData {
        return $this->personal_data ?? null;
    }

    public function getSocialInsurance(): ?SocialInsurance {
        return $this->social_insurance ?? null;
    }

    public function getTaxCard(): ?TaxCard {
        return $this->tax_card ?? null;
    }

    public function getTaxation(): ?Taxation {
        return $this->taxation ?? null;
    }

    public function getVacationEntitlement(): ?VacationEntitlement {
        return $this->vacation_entitlement ?? null;
    }

    public function getVocationalTraining(): ?VocationalTraining {
        return $this->vocational_training ?? null;
    }
}
