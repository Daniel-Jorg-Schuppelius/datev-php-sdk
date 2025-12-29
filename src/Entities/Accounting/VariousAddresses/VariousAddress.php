<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddress.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\VariousAddresses;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\Addresses\Addresses;
use Datev\Entities\Accounting\Banks\Banks;
use Datev\Entities\ClientMasterData\Communications\Communications;
use Psr\Log\LoggerInterface;

class VariousAddress extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected VariousAddressID $id;
    protected ?int $account_number;
    protected ?Addresses $addresses;
    protected ?string $business_partner_number;
    protected ?Banks $banks;
    protected ?string $caption;
    protected ?Communications $communications;
    protected ?string $correspondence_title;
    protected ?DateTime $date_last_modification;
    protected ?string $legal_entity_type;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VariousAddressID {
        return $this->id;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getAddresses(): ?Addresses {
        return $this->addresses ?? null;
    }

    public function getBusinessPartnerNumber(): ?string {
        return $this->business_partner_number ?? null;
    }

    public function getBanks(): ?Banks {
        return $this->banks ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getCommunications(): ?Communications {
        return $this->communications ?? null;
    }

    public function getCorrespondenceTitle(): ?string {
        return $this->correspondence_title ?? null;
    }

    public function getDateLastModification(): ?DateTime {
        return $this->date_last_modification ?? null;
    }

    public function getLegalEntityType(): ?string {
        return $this->legal_entity_type ?? null;
    }
}
