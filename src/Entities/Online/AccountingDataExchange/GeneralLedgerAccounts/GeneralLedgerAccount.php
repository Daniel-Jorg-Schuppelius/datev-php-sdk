<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccount.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\GeneralLedgerAccounts;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Sachkonto eines Wirtschaftsjahres.
 */
class GeneralLedgerAccount extends NamedEntity {
    protected int $accountNumber;

    protected string $additionalFunction;

    protected string $caption;

    protected int $functionExtension;

    protected int $mainFunction;

    protected int $mainFunctionNumber;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAccountNumber(): ?int {
        return $this->accountNumber ?? null;
    }

    public function getAdditionalFunction(): ?string {
        return $this->additionalFunction ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getFunctionExtension(): ?int {
        return $this->functionExtension ?? null;
    }

    public function getMainFunction(): ?int {
        return $this->mainFunction ?? null;
    }

    public function getMainFunctionNumber(): ?int {
        return $this->mainFunctionNumber ?? null;
    }
}
