<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\BankAccounts;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\Bank\BIC;
use APIToolkit\Entities\Bank\IBAN;
use DateTime;
use Datev\Entities\Common\CountryCode;
use Psr\Log\LoggerInterface;

class BankAccount extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?BankAccountID $id;
    protected ?string $bank_account_number;
    protected ?string $bank_code;
    protected ?string $bank_name;
    protected ?BIC $bic;
    protected ?CountryCode $country_code;
    protected ?IBAN $iban;
    protected ?string $note;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;
    protected ?bool $currently_valid;
    protected ?bool $is_main_bank_account;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): BankAccountID {
        return $this->id;
    }
}
