<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Account.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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

    public function getIBAN(): ?IBAN {
        return $this->iban ?? null;
    }

    public function getBIC(): ?BIC {
        return $this->bic ?? null;
    }

    public function getDifferingAccountHolder(): ?string {
        return $this->differing_account_holder ?? null;
    }
}
