<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\TaxOffices;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\CountryCodes\Code\CountryCode;
use Psr\Log\LoggerInterface;

class TaxOffice extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?TaxOfficeID $id;
    protected ?CountryCode $country_code;
    protected ?string $note;
    protected ?string $tax_number;
    protected ?string $tax_number_certificated;
    protected ?string $tax_number_standardized;
    protected ?string $tax_office_name;
    protected ?int $tax_office_number;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;
    protected ?bool $currently_valid;
    protected ?bool $is_competent_for_operational_income_tax;
    protected ?bool $is_competent_for_turnover_tax;
    protected ?bool $is_competent_for_wage_tax;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): TaxOfficeID {
        return $this->id;
    }

    public function getCountryCode(): ?CountryCode {
        return $this->country_code ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getTaxNumber(): ?string {
        return $this->tax_number ?? null;
    }

    public function getTaxNumberCertificated(): ?string {
        return $this->tax_number_certificated ?? null;
    }

    public function getTaxNumberStandardized(): ?string {
        return $this->tax_number_standardized ?? null;
    }

    public function getTaxOfficeName(): ?string {
        return $this->tax_office_name ?? null;
    }

    public function getTaxOfficeNumber(): ?int {
        return $this->tax_office_number ?? null;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to ?? null;
    }

    public function isCurrentlyValid(): bool {
        return $this->currently_valid ?? false;
    }

    public function isCompetentForOperationalIncomeTax(): bool {
        return $this->is_competent_for_operational_income_tax ?? false;
    }

    public function isCompetentForTurnoverTax(): bool {
        return $this->is_competent_for_turnover_tax ?? false;
    }

    public function isCompetentForWageTax(): bool {
        return $this->is_competent_for_wage_tax ?? false;
    }
}
