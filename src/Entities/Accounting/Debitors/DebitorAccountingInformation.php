<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorAccountingInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Debitors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\Accounting\BusinessPartners\IndividualFields;
use Psr\Log\LoggerInterface;

class DebitorAccountingInformation extends NamedEntity {
    protected ?float $account_balance;
    protected ?string $account_statement;
    protected ?string $account_statement_text;
    protected ?string $alternative_contact_person;
    protected ?string $clerk;
    protected ?int $client_bank_position;
    protected ?string $contact_person;
    protected ?int $credit_limit;
    protected ?string $currency_management;
    protected ?string $direct_debit;
    protected ?int $dunning_final_deadline;
    protected ?float $dunning_interest_rate1;
    protected ?float $dunning_interest_rate2;
    protected ?float $dunning_interest_rate3;
    protected ?float $dunning_limit_amount;
    protected ?float $dunning_limit_percent;
    protected ?int $dunning_period1;
    protected ?int $dunning_period2;
    protected ?int $dunning_period3;
    protected ?string $dunning_period_calculation;
    protected ?string $dunning_procedure;
    protected ?string $dunning_text1;
    protected ?string $dunning_text2;
    protected ?string $dunning_text3;
    protected ?bool $has_enforcement_block;
    protected ?string $interest_calculation;
    protected ?bool $is_insolvent;
    protected ?bool $is_various_account;
    protected ?string $language;
    protected ?string $output_destination;
    protected ?string $tax_number;
    protected ?DateTime $temp_direct_debit_block;
    protected ?DateTime $temp_enforcement_block;
    protected ?DateTime $temp_dunning_block;
    protected ?int $term_of_payment_id;
    protected ?IndividualFields $individual_fields;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountBalance(): ?float {
        return $this->account_balance ?? null;
    }

    public function getAccountStatement(): ?string {
        return $this->account_statement ?? null;
    }

    public function getAccountStatementText(): ?string {
        return $this->account_statement_text ?? null;
    }

    public function getAlternativeContactPerson(): ?string {
        return $this->alternative_contact_person ?? null;
    }

    public function getClerk(): ?string {
        return $this->clerk ?? null;
    }

    public function getClientBankPosition(): ?int {
        return $this->client_bank_position ?? null;
    }

    public function getContactPerson(): ?string {
        return $this->contact_person ?? null;
    }

    public function getCreditLimit(): ?int {
        return $this->credit_limit ?? null;
    }

    public function getCurrencyManagement(): ?string {
        return $this->currency_management ?? null;
    }

    public function getDirectDebit(): ?string {
        return $this->direct_debit ?? null;
    }

    public function getDunningFinalDeadline(): ?int {
        return $this->dunning_final_deadline ?? null;
    }

    public function getDunningInterestRate1(): ?float {
        return $this->dunning_interest_rate1 ?? null;
    }

    public function getDunningInterestRate2(): ?float {
        return $this->dunning_interest_rate2 ?? null;
    }

    public function getDunningInterestRate3(): ?float {
        return $this->dunning_interest_rate3 ?? null;
    }

    public function getDunningLimitAmount(): ?float {
        return $this->dunning_limit_amount ?? null;
    }

    public function getDunningLimitPercent(): ?float {
        return $this->dunning_limit_percent ?? null;
    }

    public function getDunningPeriod1(): ?int {
        return $this->dunning_period1 ?? null;
    }

    public function getDunningPeriod2(): ?int {
        return $this->dunning_period2 ?? null;
    }

    public function getDunningPeriod3(): ?int {
        return $this->dunning_period3 ?? null;
    }

    public function getDunningPeriodCalculation(): ?string {
        return $this->dunning_period_calculation ?? null;
    }

    public function getDunningProcedure(): ?string {
        return $this->dunning_procedure ?? null;
    }

    public function getDunningText1(): ?string {
        return $this->dunning_text1 ?? null;
    }

    public function getDunningText2(): ?string {
        return $this->dunning_text2 ?? null;
    }

    public function getDunningText3(): ?string {
        return $this->dunning_text3 ?? null;
    }

    public function hasEnforcementBlock(): ?bool {
        return $this->has_enforcement_block ?? null;
    }

    public function getInterestCalculation(): ?string {
        return $this->interest_calculation ?? null;
    }

    public function isInsolvent(): ?bool {
        return $this->is_insolvent ?? null;
    }

    public function isVariousAccount(): ?bool {
        return $this->is_various_account ?? null;
    }

    public function getLanguage(): ?string {
        return $this->language ?? null;
    }

    public function getOutputDestination(): ?string {
        return $this->output_destination ?? null;
    }

    public function getTaxNumber(): ?string {
        return $this->tax_number ?? null;
    }

    public function getTempDirectDebitBlock(): ?DateTime {
        return $this->temp_direct_debit_block ?? null;
    }

    public function getTempEnforcementBlock(): ?DateTime {
        return $this->temp_enforcement_block ?? null;
    }

    public function getTempDunningBlock(): ?DateTime {
        return $this->temp_dunning_block ?? null;
    }

    public function getTermOfPaymentId(): ?int {
        return $this->term_of_payment_id ?? null;
    }

    public function getIndividualFields(): ?IndividualFields {
        return $this->individual_fields ?? null;
    }
}
