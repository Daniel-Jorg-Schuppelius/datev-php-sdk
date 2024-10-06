<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankAccount.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common\BankAccounts;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\Bank\BIC;
use APIToolkit\Entities\Bank\IBAN;
use DateTime;
use Datev\Entities\ClientMasterData\CountryCodes\Code\CountryCode;
use Psr\Log\LoggerInterface;

class BankAccount extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?BankAccountID $id;
    protected ?string $bank_account_number;
    protected ?string $bank_code;
    protected ?string $bank_name;
    protected ?BIC $bic;
    protected ?CountryCode $country_code;
    protected ?string $differing_account_holder;
    protected ?IBAN $iban;
    protected ?string $note;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): BankAccountID {
        return $this->id;
    }

    public function getBankAccountNumber(): ?string {
        return $this->bank_account_number;
    }

    public function getBankCode(): ?string {
        return $this->bank_code;
    }

    public function getBankName(): ?string {
        return $this->bank_name;
    }

    public function getBIC(): ?BIC {
        return $this->bic;
    }

    public function getCountryCode(): ?CountryCode {
        return $this->country_code;
    }

    public function getDifferingAccountHolder(): ?string {
        return $this->differing_account_holder;
    }

    public function getIBAN(): ?IBAN {
        return $this->iban;
    }

    public function getNote(): ?string {
        return $this->note;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to;
    }
}
