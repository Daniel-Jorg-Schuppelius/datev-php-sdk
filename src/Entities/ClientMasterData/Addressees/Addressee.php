<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Addressees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\Addresses\Addresses;
use Datev\Entities\ClientMasterData\BankAccounts\BankAccounts;
use Datev\Entities\ClientMasterData\Communications\Communications;
use Datev\Entities\ClientMasterData\CompanyNames\CompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\CompanyNames;
use Datev\Entities\ClientMasterData\ContactPersons\ContactPersons;
use Datev\Entities\ClientMasterData\Details\Detail;
use Datev\Entities\ClientMasterData\LegalForms\ID\LegalFormID;
use Datev\Entities\ClientMasterData\LegalForms\BaseIDs\LegalFormIDs;
use Datev\Entities\ClientMasterData\ShortNames\ShortNames;
use Datev\Entities\ClientMasterData\Surnames\Surname;
use Datev\Entities\ClientMasterData\Surnames\Surnames;
use Datev\Entities\ClientMasterData\TaxOffices\TaxOffices;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Addressee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AddresseeID $id;
    protected ?string $eu_vat_id_country_code;
    protected ?string $eu_vat_id_number;
    protected ?ShortNames $short_names;
    protected ?string $current_short_name;
    protected ?Status $status;
    protected ?string $surrogate_name;
    protected ?DateTime $timestamp;
    protected ?string $type;
    protected ?DateTime $date_of_birth;
    protected ?string $etin;
    protected ?string $firstname;
    protected ?string $sex;
    protected ?Surnames $surnames;
    protected ?Surname $current_surname;
    protected ?string $tax_identification_number;
    protected ?CompanyNames $company_names;
    protected ?CompanyName $current_company_name;
    protected ?DateTime $date_of_foundation;
    protected ?LegalFormIDs $legal_form_ids;
    protected ?LegalFormID $current_legal_form_id;
    protected ?Detail $detail;
    protected ?Addresses $addresses;
    protected ?Communications $communications;
    protected ?BankAccounts $bank_accounts;
    protected ?TaxOffices $tax_offices;
    protected ?ContactPersons $contact_persons;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AddresseeID {
        return $this->id;
    }
}
