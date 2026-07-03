<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BasicAccountingInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Accounting\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Buchführungs-Grunddaten eines Wirtschaftsjahres.
 */
class BasicAccountingInformation extends NamedEntity {
    protected string $fiscal_year_start;

    protected string $fiscal_year_end;

    protected int $account_length;

    protected int $datev_chart_of_accounts;

    protected Ledgers $ledgers;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getFiscalYearStart(): ?string {
        return $this->fiscal_year_start ?? null;
    }

    public function getFiscalYearEnd(): ?string {
        return $this->fiscal_year_end ?? null;
    }

    public function getAccountLength(): ?int {
        return $this->account_length ?? null;
    }

    public function getDatevChartOfAccounts(): ?int {
        return $this->datev_chart_of_accounts ?? null;
    }

    public function getLedgers(): ?Ledgers {
        return $this->ledgers ?? null;
    }
}
