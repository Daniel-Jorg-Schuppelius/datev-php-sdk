<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYear.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\FiscalYears;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Wirtschaftsjahr des Mandanten (Accounting Data Exchange).
 */
class FiscalYear extends NamedEntity {
    protected int $accountLength;

    protected int $accountSystem;

    protected string $advanceTurnoverTaxReturn;

    protected int $costLength;

    protected string $currencyCode;

    protected bool $isInvoiceDateCheckOn;

    protected bool $isUsingDeliveryDate;

    protected string $legalForm;

    protected string $methodOfDeterminingNetIncome;

    protected string $nationalRight;

    protected string $taxationMethod;

    protected string $yearBegin;

    protected string $yearEnd;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountLength(): ?int {
        return $this->accountLength ?? null;
    }

    public function getAccountSystem(): ?int {
        return $this->accountSystem ?? null;
    }

    public function getAdvanceTurnoverTaxReturn(): ?string {
        return $this->advanceTurnoverTaxReturn ?? null;
    }

    public function getCostLength(): ?int {
        return $this->costLength ?? null;
    }

    public function getCurrencyCode(): ?string {
        return $this->currencyCode ?? null;
    }

    public function isInvoiceDateCheckOn(): bool {
        return $this->isInvoiceDateCheckOn ?? false;
    }

    public function isUsingDeliveryDate(): bool {
        return $this->isUsingDeliveryDate ?? false;
    }

    public function getLegalForm(): ?string {
        return $this->legalForm ?? null;
    }

    public function getMethodOfDeterminingNetIncome(): ?string {
        return $this->methodOfDeterminingNetIncome ?? null;
    }

    public function getNationalRight(): ?string {
        return $this->nationalRight ?? null;
    }

    public function getTaxationMethod(): ?string {
        return $this->taxationMethod ?? null;
    }

    public function getYearBegin(): ?string {
        return $this->yearBegin ?? null;
    }

    public function getYearEnd(): ?string {
        return $this->yearEnd ?? null;
    }
}
