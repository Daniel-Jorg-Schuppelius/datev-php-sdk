<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\PostingProposalRules;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\DebitCredit;
use Psr\Log\LoggerInterface;

class PostingProposalInformation extends NamedEntity {
    protected ?int $accounting_transaction_key;
    protected ?int $account_number;
    protected ?int $business_partner_account_number;
    protected ?string $kost1_cost_center_id;
    protected ?string $kost2_cost_center_id;
    protected ?string $posting_description;
    protected ?string $origin_of_posting_description;
    protected ?string $calculation_mode;
    protected ?float $fixed_amount;
    protected ?DebitCredit $fixed_amount_debit_credit_identifier;
    protected ?int $position;
    protected ?float $percentage_of_payment_amount;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountingTransactionKey(): ?int {
        return $this->accounting_transaction_key ?? null;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getBusinessPartnerAccountNumber(): ?int {
        return $this->business_partner_account_number ?? null;
    }

    public function getKost1CostCenterId(): ?string {
        return $this->kost1_cost_center_id ?? null;
    }

    public function getKost2CostCenterId(): ?string {
        return $this->kost2_cost_center_id ?? null;
    }

    public function getPostingDescription(): ?string {
        return $this->posting_description ?? null;
    }

    public function getOriginOfPostingDescription(): ?string {
        return $this->origin_of_posting_description ?? null;
    }

    public function getCalculationMode(): ?string {
        return $this->calculation_mode ?? null;
    }

    public function getFixedAmount(): ?float {
        return $this->fixed_amount ?? null;
    }

    public function getFixedAmountDebitCreditIdentifier(): ?DebitCredit {
        return $this->fixed_amount_debit_credit_identifier ?? null;
    }

    public function getPosition(): ?int {
        return $this->position ?? null;
    }

    public function getPercentageOfPaymentAmount(): ?float {
        return $this->percentage_of_payment_amount ?? null;
    }
}
