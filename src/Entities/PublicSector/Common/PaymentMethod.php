<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PaymentMethod.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Common;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class PaymentMethod extends NamedEntity {
    protected ?string $id;
    protected ?string $valid_from;
    protected ?string $valid_to;
    protected ?string $commissioner;
    protected ?string $bank_account_number;
    protected ?string $bank_code;
    protected ?string $iban;
    protected ?string $bic;
    protected ?string $bank_name;
    protected ?string $account_holder;
    protected ?string $sepa_mandate_reference;
    protected ?string $differing_account_holder;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getAccountHolder(): ?string {
        return $this->account_holder ?? null;
    }

    public function getIban(): ?string {
        return $this->iban ?? null;
    }

    public function getBic(): ?string {
        return $this->bic ?? null;
    }

    public function getBankName(): ?string {
        return $this->bank_name ?? null;
    }

    public function getSepaMandateReference(): ?string {
        return $this->sepa_mandate_reference ?? null;
    }
}
