<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Salaries;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Salary extends NamedEntity implements IdentifiableInterface {
    protected SalaryID $id;
    protected ?string $personnel_number;
    protected ?DateTime $date_of_emergence;
    protected ?float $current_gross_payment;
    protected ?float $current_gross_tax;
    protected ?float $wage_tax;
    protected ?float $wage_tax_non_recurring_payment;
    protected ?float $wage_tax_monthly;
    protected ?float $church_tax_non_recurring_payment;
    protected ?float $church_tax_monthly;
    protected ?float $solidarity_tax_monthly;
    protected ?float $solidarity_tax_non_recurring_payment;
    protected ?float $health_insurance_employees_contribution_non_recurring_payment;
    protected ?float $health_insurance_monthly_contribution_employee;
    protected ?float $health_insurance_monthly_contribution_employer;
    protected ?float $non_recurring_payment_employers_contribution_to_health_insurance;
    protected ?float $health_insurance_gross_non_recurring_payment;
    protected ?float $health_insurance_gross_monthly_contribution;
    protected ?float $non_recurring_payment_employers_contribution_to_unemployment_insurance;
    protected ?float $unemployment_insurance_monthly_contribution_employer;
    protected ?float $unemployment_insurance_employees_contribution_non_recurring_payment;
    protected ?float $unemployment_insurance_monthly_contribution_employee;
    protected ?float $unemployment_insurance_gross_non_recurring_payment;
    protected ?float $unemployment_insurance_gross_monthly_contribution;
    protected ?float $non_recurring_payment_employers_contribution_to_long_term_care_insurance;
    protected ?float $long_term_care_insurance_monthly_contribution_employer;
    protected ?float $long_term_care_insurance_employees_contribution_non_recurring_payment;
    protected ?float $long_term_care_insurance_monthly_contribution_employee;
    protected ?float $long_term_care_insurance_gross_non_recurring_payment;
    protected ?float $long_term_care_insurance_gross_monthly_contribution;
    protected ?float $non_recurring_payment_employers_contribution_to_pension_insurance;
    protected ?float $pension_insurance_monthly_contribution_employer;
    protected ?float $pension_insurance_monthly_contribution_employee;
    protected ?float $pension_insurance_employees_contribution_non_recurring_payment;
    protected ?float $pension_insurance_gross_non_recurring_payment;
    protected ?float $pension_insurance_gross_monthly_contribution;
    protected ?float $net_income;
    protected ?float $amount_paid;
    protected ?float $net_payments_and_net_deductions;
    protected ?float $allocation1;
    protected ?float $allocation2;
    protected ?float $monthly_allocation_to_insolvency_benefit;
    protected ?float $annual_allocation_to_insolvency_benefit;
    protected ?float $social_security_deductions;
    protected ?float $tax_deductions;
    protected ?float $tax_class;
    protected ?float $gross_tax_non_recurring_payment;
    protected ?float $tax_relevant_days;
    protected ?float $flat_rate_tax_other_payments;
    protected ?float $flat_rate_tax_company_events;
    protected ?float $flat_rate_tax_recreational_allowance;
    protected ?float $flat_rate_tax_meal_allowance;
    protected ?float $flat_rate_tax_additional_meal_expenses;
    protected ?float $flat_rate_tax_subsidy_pc_and_grant_internet;
    protected ?float $flat_rate_tax_benefits_in_kind;
    protected ?float $special_flat_rate_tax;
    protected ?float $constantly_special_flat_rate_tax;
    protected ?float $annually_special_flat_rate_tax;
    protected ?float $payment_flat_rate_tax_low_paid_employed;
    protected ?float $payment_flat_rate_tax_mini_job;
    protected ?float $payment_flat_rate_tax_short_term_employed;
    protected ?float $payment_flat_rate_tax_agriculture_and_forestry_temporary_employed;
    protected ?float $flat_rate_wage_tax_grant_ride_costs;
    protected ?float $flat_rate_wage_tax_direct_insurance_contributions;
    protected ?float $flat_rate_wage_tax_contributions_to_pension_funds;
    protected ?float $flat_rate_wage_tax_recreational_allowance;
    protected ?float $flat_rate_wage_tax_salaries_part_time_employed;
    protected ?float $flat_rate_wage_tax_mini_job;
    protected ?float $flat_rate_solitary_tax_grant_ride_costs;
    protected ?float $flat_rate_solitary_tax_temporary_employed;
    protected ?float $flat_rate_solitary_tax_agriculture_and_forestry_temporary_employed;
    protected ?float $flat_rate_church_tax_grant_ride_costs;
    protected ?float $flat_rate_church_tax_temporary_employed;
    protected ?float $flat_rate_church_tax_agriculture_and_forestry_temporary_employed;
    protected ?float $flat_rate_church_tax_part_time_employed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): SalaryID {
        return $this->id;
    }
}