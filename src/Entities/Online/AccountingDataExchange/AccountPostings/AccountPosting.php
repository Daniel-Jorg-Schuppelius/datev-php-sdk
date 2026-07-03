<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPosting.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\AccountPostings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\DataExchangeRecordType;
use Psr\Log\LoggerInterface;

/**
 * Buchungssatz aus dem Buchungsdatenservice (Accounting Data Exchange).
 */
class AccountPosting extends NamedEntity {
    protected int $accountNumber;

    protected int $accountingSequenceId;

    protected int $accountingTransactionKey;

    protected int $accountingTransactionKey49AdditionalFunction;

    protected int $accountingTransactionKey49MainFunctionNumber;

    protected int $accountingTransactionKey49MainFunctionType;

    protected int $additionalFunctionsForGoodsAndServices;

    protected float $amountCredit;

    protected float $amountDebit;

    protected AdvancePayment $advancePayment;

    protected string $billingReference;

    protected float $cashDiscount;

    protected string $cashDiscountType;

    protected int $casesRelatedToGoodsAndServices;

    protected int $contraAccountNumber;

    protected string $currencyCode;

    protected string $date;

    protected string $deliveryDate;

    protected string $differingTaxationMethod;

    protected string $documentField1;

    protected string $documentField2;

    protected DocumentLink $documentLink;

    protected float $euTaxRate;

    protected float $euTaxRateForCountryOfOrigin;

    protected string $euVatId;

    protected string $euVatIdForCountryOfOrigin;

    protected float $exchangeRate;

    protected string $followOnPostingType;

    protected bool $generalReversal;

    protected bool $isOpeningBalancePosting;

    protected string $kostDate;

    protected float $kostQuantity;

    protected string $kost1CostCenterId;

    protected string $kost2CostCenterId;

    protected string $markOfOrigin;

    protected string $postingDescription;

    protected float $quantity;

    protected DataExchangeRecordType $recordType;

    protected float $taxRate;

    protected float $weight;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountNumber(): ?int {
        return $this->accountNumber ?? null;
    }

    public function getAccountingSequenceId(): ?int {
        return $this->accountingSequenceId ?? null;
    }

    public function getAccountingTransactionKey(): ?int {
        return $this->accountingTransactionKey ?? null;
    }

    public function getAccountingTransactionKey49AdditionalFunction(): ?int {
        return $this->accountingTransactionKey49AdditionalFunction ?? null;
    }

    public function getAccountingTransactionKey49MainFunctionNumber(): ?int {
        return $this->accountingTransactionKey49MainFunctionNumber ?? null;
    }

    public function getAccountingTransactionKey49MainFunctionType(): ?int {
        return $this->accountingTransactionKey49MainFunctionType ?? null;
    }

    public function getAdditionalFunctionsForGoodsAndServices(): ?int {
        return $this->additionalFunctionsForGoodsAndServices ?? null;
    }

    public function getAmountCredit(): ?float {
        return $this->amountCredit ?? null;
    }

    public function getAmountDebit(): ?float {
        return $this->amountDebit ?? null;
    }

    public function getAdvancePayment(): ?AdvancePayment {
        return $this->advancePayment ?? null;
    }

    public function getBillingReference(): ?string {
        return $this->billingReference ?? null;
    }

    public function getCashDiscount(): ?float {
        return $this->cashDiscount ?? null;
    }

    public function getCashDiscountType(): ?string {
        return $this->cashDiscountType ?? null;
    }

    public function getCasesRelatedToGoodsAndServices(): ?int {
        return $this->casesRelatedToGoodsAndServices ?? null;
    }

    public function getContraAccountNumber(): ?int {
        return $this->contraAccountNumber ?? null;
    }

    public function getCurrencyCode(): ?string {
        return $this->currencyCode ?? null;
    }

    public function getDate(): ?string {
        return $this->date ?? null;
    }

    public function getDeliveryDate(): ?string {
        return $this->deliveryDate ?? null;
    }

    public function getDifferingTaxationMethod(): ?string {
        return $this->differingTaxationMethod ?? null;
    }

    public function getDocumentField1(): ?string {
        return $this->documentField1 ?? null;
    }

    public function getDocumentField2(): ?string {
        return $this->documentField2 ?? null;
    }

    public function getDocumentLink(): ?DocumentLink {
        return $this->documentLink ?? null;
    }

    public function getEuTaxRate(): ?float {
        return $this->euTaxRate ?? null;
    }

    public function getEuTaxRateForCountryOfOrigin(): ?float {
        return $this->euTaxRateForCountryOfOrigin ?? null;
    }

    public function getEuVatId(): ?string {
        return $this->euVatId ?? null;
    }

    public function getEuVatIdForCountryOfOrigin(): ?string {
        return $this->euVatIdForCountryOfOrigin ?? null;
    }

    public function getExchangeRate(): ?float {
        return $this->exchangeRate ?? null;
    }

    public function getFollowOnPostingType(): ?string {
        return $this->followOnPostingType ?? null;
    }

    public function isGeneralReversal(): bool {
        return $this->generalReversal ?? false;
    }

    public function isOpeningBalancePosting(): bool {
        return $this->isOpeningBalancePosting ?? false;
    }

    public function getKostDate(): ?string {
        return $this->kostDate ?? null;
    }

    public function getKostQuantity(): ?float {
        return $this->kostQuantity ?? null;
    }

    public function getKost1CostCenterId(): ?string {
        return $this->kost1CostCenterId ?? null;
    }

    public function getKost2CostCenterId(): ?string {
        return $this->kost2CostCenterId ?? null;
    }

    public function getMarkOfOrigin(): ?string {
        return $this->markOfOrigin ?? null;
    }

    public function getPostingDescription(): ?string {
        return $this->postingDescription ?? null;
    }

    public function getQuantity(): ?float {
        return $this->quantity ?? null;
    }

    public function getRecordType(): ?DataExchangeRecordType {
        return $this->recordType ?? null;
    }

    public function getTaxRate(): ?float {
        return $this->taxRate ?? null;
    }

    public function getWeight(): ?float {
        return $this->weight ?? null;
    }
}
