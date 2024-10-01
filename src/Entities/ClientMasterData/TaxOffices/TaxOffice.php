<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\TaxOffices;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class TaxOffice extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?TaxOfficeID $id;
    protected ?string $country_code;
    protected ?string $note;
    protected ?string $tax_number;
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
}
