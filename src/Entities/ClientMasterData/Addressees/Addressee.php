<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Addressee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
use Datev\Entities\ClientMasterData\LegalForms\LegalFormIDs;
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

    public function getEuVatIdCountryCode(): ?string {
        return $this->eu_vat_id_country_code ?? null;
    }

    public function getEuVatIdNumber(): ?string {
        return $this->eu_vat_id_number ?? null;
    }

    public function getShortNames(): ?ShortNames {
        return $this->short_names ?? null;
    }

    public function getCurrentShortName(): ?string {
        return $this->current_short_name ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getSurrogateName(): ?string {
        return $this->surrogate_name ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getDateOfBirth(): ?DateTime {
        return $this->date_of_birth ?? null;
    }

    public function getEtin(): ?string {
        return $this->etin ?? null;
    }

    public function getFirstname(): ?string {
        return $this->firstname ?? null;
    }

    public function getSex(): ?string {
        return $this->sex ?? null;
    }

    public function getSurnames(): ?Surnames {
        return $this->surnames ?? null;
    }

    public function getCurrentSurname(): ?Surname {
        return $this->current_surname ?? null;
    }

    public function getTaxIdentificationNumber(): ?string {
        return $this->tax_identification_number ?? null;
    }

    public function getCompanyNames(): ?CompanyNames {
        return $this->company_names ?? null;
    }

    public function getCurrentCompanyName(): ?CompanyName {
        return $this->current_company_name ?? null;
    }

    public function getDateOfFoundation(): ?DateTime {
        return $this->date_of_foundation ?? null;
    }

    public function getLegalFormIDs(): ?LegalFormIDs {
        return $this->legal_form_ids ?? null;
    }

    public function getCurrentLegalFormID(): ?LegalFormID {
        return $this->current_legal_form_id ?? null;
    }

    public function getDetail(): ?Detail {
        return $this->detail ?? null;
    }

    public function getAddresses(): ?Addresses {
        return $this->addresses ?? null;
    }

    public function getCommunications(): ?Communications {
        return $this->communications ?? null;
    }

    public function getBankAccounts(): ?BankAccounts {
        return $this->bank_accounts ?? null;
    }

    public function getTaxOffices(): ?TaxOffices {
        return $this->tax_offices ?? null;
    }

    public function getContactPersons(): ?ContactPersons {
        return $this->contact_persons ?? null;
    }
}
