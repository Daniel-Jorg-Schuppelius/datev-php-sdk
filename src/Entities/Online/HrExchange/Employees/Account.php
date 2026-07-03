<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Account.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Employees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Bankverbindung des Arbeitnehmers.
 */
class Account extends NamedEntity {
    protected string $iban;

    protected string $bic;

    protected string $differing_account_holder;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getIban(): ?string {
        return $this->iban ?? null;
    }

    public function getBic(): ?string {
        return $this->bic ?? null;
    }

    public function getDifferingAccountHolder(): ?string {
        return $this->differing_account_holder ?? null;
    }
}
