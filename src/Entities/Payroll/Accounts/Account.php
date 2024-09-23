<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Accounts;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\Bank\BIC;
use APIToolkit\Entities\Bank\IBAN;
use Psr\Log\LoggerInterface;

class Account extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AccountID $id;
    protected ?IBAN $iban;
    protected ?BIC $bic;
    protected ?string $differing_account_holder;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AccountID {
        return $this->id;
    }
}
