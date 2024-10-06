<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Salary.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Salaries;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class Salary extends NamedEntity implements IdentifiableNamedEntityInterface {
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

    public function getPersonnelNumber(): ?string {
        return $this->personnel_number ?? null;
    }

    public function getDateOfEmergence(): ?DateTime {
        return $this->date_of_emergence ?? null;
    }

    public function getCurrentGrossPayment(): ?float {
        return $this->current_gross_payment ?? null;
    }

    public function getCurrentGrossTax(): ?float {
        return $this->current_gross_tax ?? null;
    }

    public function getWageTax(): ?float {
        return $this->wage_tax ?? null;
    }

    public function getWageTaxNonRecurringPayment(): ?float {
        return $this->wage_tax_non_recurring_payment ?? null;
    }

    public function getWageTaxMonthly(): ?float {
        return $this->wage_tax_monthly ?? null;
    }

    public function getChurchTaxNonRecurringPayment(): ?float {
        return $this->church_tax_non_recurring_payment ?? null;
    }

    public function getChurchTaxMonthly(): ?float {
        return $this->church_tax_monthly ?? null;
    }

    public function getSolidarityTaxMonthly(): ?float {
        return $this->solidarity_tax_monthly ?? null;
    }

    public function getSolidarityTaxNonRecurringPayment(): ?float {
        return $this->solidarity_tax_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->health_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceMonthlyContributionEmployee(): ?float {
        return $this->health_insurance_monthly_contribution_employee ?? null;
    }

    public function getHealthInsuranceMonthlyContributionEmployer(): ?float {
        return $this->health_insurance_monthly_contribution_employer ?? null;
    }

    public function getNonRecurringPaymentEmployersContributionToHealthInsurance(): ?float {
        return $this->non_recurring_payment_employers_contribution_to_health_insurance ?? null;
    }

    public function getHealthInsuranceGrossNonRecurringPayment(): ?float {
        return $this->health_insurance_gross_non_recurring_payment ?? null;
    }

    public function getHealthInsuranceGrossMonthlyContribution(): ?float {
        return $this->health_insurance_gross_monthly_contribution ?? null;
    }

    public function getNonRecurringPaymentEmployersContributionToUnemploymentInsurance(): ?float {
        return $this->non_recurring_payment_employers_contribution_to_unemployment_insurance ?? null;
    }

    public function getUnemploymentInsuranceMonthlyContributionEmployer(): ?float {
        return $this->unemployment_insurance_monthly_contribution_employer ?? null;
    }

    public function getUnemploymentInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->unemployment_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getUnemploymentInsuranceMonthlyContributionEmployee(): ?float {
        return $this->unemployment_insurance_monthly_contribution_employee ?? null;
    }

    public function getUnemploymentInsuranceGrossNonRecurringPayment(): ?float {
        return $this->unemployment_insurance_gross_non_recurring_payment ?? null;
    }

    public function getUnemploymentInsuranceGrossMonthlyContribution(): ?float {
        return $this->unemployment_insurance_gross_monthly_contribution ?? null;
    }

    public function getNonRecurringPaymentEmployersContributionToLongTermCareInsurance(): ?float {
        return $this->non_recurring_payment_employers_contribution_to_long_term_care_insurance ?? null;
    }

    public function getLongTermCareInsuranceMonthlyContributionEmployer(): ?float {
        return $this->long_term_care_insurance_monthly_contribution_employer ?? null;
    }

    public function getLongTermCareInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->long_term_care_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getLongTermCareInsuranceMonthlyContributionEmployee(): ?float {
        return $this->long_term_care_insurance_monthly_contribution_employee ?? null;
    }

    public function getLongTermCareInsuranceGrossNonRecurringPayment(): ?float {
        return $this->long_term_care_insurance_gross_non_recurring_payment ?? null;
    }

    public function getLongTermCareInsuranceGrossMonthlyContribution(): ?float {
        return $this->long_term_care_insurance_gross_monthly_contribution ?? null;
    }

    public function getNonRecurringPaymentEmployersContributionToPensionInsurance(): ?float {
        return $this->non_recurring_payment_employers_contribution_to_pension_insurance ?? null;
    }

    public function getPensionInsuranceMonthlyContributionEmployer(): ?float {
        return $this->pension_insurance_monthly_contribution_employer ?? null;
    }

    public function getPensionInsuranceMonthlyContributionEmployee(): ?float {
        return $this->pension_insurance_monthly_contribution_employee ?? null;
    }

    public function getPensionInsuranceEmployeesContributionNonRecurringPayment(): ?float {
        return $this->pension_insurance_employees_contribution_non_recurring_payment ?? null;
    }

    public function getPensionInsuranceGrossNonRecurringPayment(): ?float {
        return $this->pension_insurance_gross_non_recurring_payment ?? null;
    }

    public function getPensionInsuranceGrossMonthlyContribution(): ?float {
        return $this->pension_insurance_gross_monthly_contribution ?? null;
    }

    public function getNetIncome(): ?float {
        return $this->net_income ?? null;
    }

    public function getAmountPaid(): ?float {
        return $this->amount_paid ?? null;
    }

    public function getNetPaymentsAndNetDeductions(): ?float {
        return $this->net_payments_and_net_deductions ?? null;
    }

    public function getAllocation1(): ?float {
        return $this->allocation1 ?? null;
    }

    public function getAllocation2(): ?float {
        return $this->allocation2 ?? null;
    }

    public function getMonthlyAllocationToInsolvencyBenefit(): ?float {
        return $this->monthly_allocation_to_insolvency_benefit ?? null;
    }

    public function getAnnualAllocationToInsolvencyBenefit(): ?float {
        return $this->annual_allocation_to_insolvency_benefit ?? null;
    }

    public function getSocialSecurityDeductions(): ?float {
        return $this->social_security_deductions ?? null;
    }

    public function getTaxDeductions(): ?float {
        return $this->tax_deductions ?? null;
    }

    public function getTaxClass(): ?float {
        return $this->tax_class ?? null;
    }

    public function getGrossTaxNonRecurringPayment(): ?float {
        return $this->gross_tax_non_recurring_payment ?? null;
    }

    public function getTaxRelevantDays(): ?float {
        return $this->tax_relevant_days ?? null;
    }

    public function getFlatRateTaxOtherPayments(): ?float {
        return $this->flat_rate_tax_other_payments ?? null;
    }

    public function getFlatRateTaxCompanyEvents(): ?float {
        return $this->flat_rate_tax_company_events ?? null;
    }

    public function getFlatRateTaxRecreationalAllowance(): ?float {
        return $this->flat_rate_tax_recreational_allowance ?? null;
    }

    public function getFlatRateTaxMealAllowance(): ?float {
        return $this->flat_rate_tax_meal_allowance ?? null;
    }

    public function getFlatRateTaxAdditionalMealExpenses(): ?float {
        return $this->flat_rate_tax_additional_meal_expenses ?? null;
    }

    public function getFlatRateTaxSubsidyPcAndGrantInternet(): ?float {
        return $this->flat_rate_tax_subsidy_pc_and_grant_internet ?? null;
    }

    public function getFlatRateTaxBenefitsInKind(): ?float {
        return $this->flat_rate_tax_benefits_in_kind ?? null;
    }

    public function getSpecialFlatRateTax(): ?float {
        return $this->special_flat_rate_tax ?? null;
    }

    public function getConstantlySpecialFlatRateTax(): ?float {
        return $this->constantly_special_flat_rate_tax ?? null;
    }

    public function getAnnuallySpecialFlatRateTax(): ?float {
        return $this->annually_special_flat_rate_tax ?? null;
    }

    public function getPaymentFlatRateTaxLowPaidEmployed(): ?float {
        return $this->payment_flat_rate_tax_low_paid_employed ?? null;
    }

    public function getPaymentFlatRateTaxMiniJob(): ?float {
        return $this->payment_flat_rate_tax_mini_job ?? null;
    }

    public function getPaymentFlatRateTaxShortTermEmployed(): ?float {
        return $this->payment_flat_rate_tax_short_term_employed ?? null;
    }

    public function getPaymentFlatRateTaxAgricultureAndForestryTemporaryEmployed(): ?float {
        return $this->payment_flat_rate_tax_agriculture_and_forestry_temporary_employed ?? null;
    }

    public function getFlatRateWageTaxGrantRideCosts(): ?float {
        return $this->flat_rate_wage_tax_grant_ride_costs ?? null;
    }

    public function getFlatRateWageTaxDirectInsuranceContributions(): ?float {
        return $this->flat_rate_wage_tax_direct_insurance_contributions ?? null;
    }

    public function getFlatRateWageTaxContributionsToPensionFunds(): ?float {
        return $this->flat_rate_wage_tax_contributions_to_pension_funds ?? null;
    }

    public function getFlatRateWageTaxRecreationalAllowance(): ?float {
        return $this->flat_rate_wage_tax_recreational_allowance ?? null;
    }

    public function getFlatRateWageTaxSalariesPartTimeEmployed(): ?float {
        return $this->flat_rate_wage_tax_salaries_part_time_employed ?? null;
    }

    public function getFlatRateWageTaxMiniJob(): ?float {
        return $this->flat_rate_wage_tax_mini_job ?? null;
    }

    public function getFlatRateSolitaryTaxGrantRideCosts(): ?float {
        return $this->flat_rate_solitary_tax_grant_ride_costs ?? null;
    }

    public function getFlatRateSolitaryTaxTemporaryEmployed(): ?float {
        return $this->flat_rate_solitary_tax_temporary_employed ?? null;
    }

    public function getFlatRateSolitaryTaxAgricultureAndForestryTemporaryEmployed(): ?float {
        return $this->flat_rate_solitary_tax_agriculture_and_forestry_temporary_employed ?? null;
    }

    public function getFlatRateChurchTaxGrantRideCosts(): ?float {
        return $this->flat_rate_church_tax_grant_ride_costs ?? null;
    }

    public function getFlatRateChurchTaxTemporaryEmployed(): ?float {
        return $this->flat_rate_church_tax_temporary_employed ?? null;
    }

    public function getFlatRateChurchTaxAgricultureAndForestryTemporaryEmployed(): ?float {
        return $this->flat_rate_church_tax_agriculture_and_forestry_temporary_employed ?? null;
    }

    public function getFlatRateChurchTaxPartTimeEmployed(): ?float {
        return $this->flat_rate_church_tax_part_time_employed ?? null;
    }
}
