<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\BIC;
use Datev\Entities\IBAN;
use Psr\Log\LoggerInterface;

class Account extends NamedEntity implements IdentifiableInterface {
    protected ?ClientID $id;
    protected ?IBAN $iban;
    protected ?BIC $bic;
    protected ?string $differing_account_holder;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientID {
        return $this->id;
    }
}