<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Creditor.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Creditors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\Addresses\Addresses;
use Datev\Entities\ClientMasterData\Communications\Communications;
use Datev\Entities\Accounting\Banks\Banks;
use Psr\Log\LoggerInterface;

class Creditor extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected CreditorID $id;
    protected ?int $account_number;
    protected ?string $addressee_id;
    protected ?string $alternative_search_name;
    protected ?string $business_partner_number;
    protected ?string $business_partner_relation_id;
    protected ?string $caption;
    protected ?string $complimentary_close;
    protected ?string $correspondence_title;
    protected ?DateTime $date_last_modification;
    protected ?string $eu_vat_id_country_code;
    protected ?string $eu_vat_id_number;
    protected ?bool $is_business_partner_active;
    protected ?bool $is_organization_business_partner;
    protected ?string $legal_entity_type;
    protected ?string $salutation;
    protected ?string $short_name;
    protected ?string $third_party_number;
    protected ?Addresses $addresses;
    protected ?Communications $communications;
    protected ?Banks $banks;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CreditorID {
        return $this->id;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getCaption(): ?string {
        return $this->caption ?? null;
    }

    public function getShortName(): ?string {
        return $this->short_name ?? null;
    }

    public function getAddresseeId(): ?string {
        return $this->addressee_id ?? null;
    }

    public function isBusinessPartnerActive(): ?bool {
        return $this->is_business_partner_active ?? null;
    }

    public function getDateLastModification(): ?DateTime {
        return $this->date_last_modification ?? null;
    }

    public function getAddresses(): ?Addresses {
        return $this->addresses ?? null;
    }

    public function getCommunications(): ?Communications {
        return $this->communications ?? null;
    }

    public function getBanks(): ?Banks {
        return $this->banks ?? null;
    }
}
