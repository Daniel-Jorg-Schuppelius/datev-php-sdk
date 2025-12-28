<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYear.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\FiscalYears;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class FiscalYear extends NamedEntity {
    protected ?string $id;
    protected ?int $account_length;
    protected ?int $account_system;
    protected ?string $advance_turnover_tax_return;
    protected ?string $basis_of_checking_account_function;
    protected ?DateTime $begin;
    protected ?int $client_number;
    protected ?int $consultant_number;
    protected ?int $cost_length;
    protected ?int $creditor_term_of_payment_id;
    protected ?string $currency_code;
    protected ?int $debitor_term_of_payment_id;
    protected ?DateTime $end;
    protected ?bool $is_invoice_date_check_on;
    protected ?bool $is_locked;
    protected ?bool $is_using_delivery_date;
    protected ?bool $is_using_receivable_type;
    protected ?string $legal_form;
    protected ?string $method_of_determining_net_income;
    protected ?string $national_right;
    protected ?string $taxation_method;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getAccountLength(): ?int {
        return $this->account_length ?? null;
    }

    public function getAccountSystem(): ?int {
        return $this->account_system ?? null;
    }

    public function getAdvanceTurnoverTaxReturn(): ?string {
        return $this->advance_turnover_tax_return ?? null;
    }

    public function getBasisOfCheckingAccountFunction(): ?string {
        return $this->basis_of_checking_account_function ?? null;
    }

    public function getBegin(): ?DateTime {
        return $this->begin ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getConsultantNumber(): ?int {
        return $this->consultant_number ?? null;
    }

    public function getCostLength(): ?int {
        return $this->cost_length ?? null;
    }

    public function getCreditorTermOfPaymentId(): ?int {
        return $this->creditor_term_of_payment_id ?? null;
    }

    public function getCurrencyCode(): ?string {
        return $this->currency_code ?? null;
    }

    public function getDebitorTermOfPaymentId(): ?int {
        return $this->debitor_term_of_payment_id ?? null;
    }

    public function getEnd(): ?DateTime {
        return $this->end ?? null;
    }

    public function isInvoiceDateCheckOn(): ?bool {
        return $this->is_invoice_date_check_on ?? null;
    }

    public function isLocked(): ?bool {
        return $this->is_locked ?? null;
    }

    public function isUsingDeliveryDate(): ?bool {
        return $this->is_using_delivery_date ?? null;
    }

    public function isUsingReceivableType(): ?bool {
        return $this->is_using_receivable_type ?? null;
    }

    public function getLegalForm(): ?string {
        return $this->legal_form ?? null;
    }

    public function getMethodOfDeterminingNetIncome(): ?string {
        return $this->method_of_determining_net_income ?? null;
    }

    public function getNationalRight(): ?string {
        return $this->national_right ?? null;
    }

    public function getTaxationMethod(): ?string {
        return $this->taxation_method ?? null;
    }
}
