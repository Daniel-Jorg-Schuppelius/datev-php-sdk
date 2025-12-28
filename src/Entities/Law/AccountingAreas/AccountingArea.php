<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingArea.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\AccountingAreas;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class AccountingArea extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AccountingAreaID $id;
    protected ?int $number;
    protected ?string $name;
    protected ?array $fiscal_year;
    protected ?int $general_ledger_account_length;
    protected ?int $general_ledger_accounts_frame;
    protected ?string $taxation_method;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?AccountingAreaID {
        return $this->id ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getFiscalYear(): ?array {
        return $this->fiscal_year ?? null;
    }

    public function getGeneralLedgerAccountLength(): ?int {
        return $this->general_ledger_account_length ?? null;
    }

    public function getGeneralLedgerAccountsFrame(): ?int {
        return $this->general_ledger_accounts_frame ?? null;
    }

    public function getTaxationMethod(): ?string {
        return $this->taxation_method ?? null;
    }
}
