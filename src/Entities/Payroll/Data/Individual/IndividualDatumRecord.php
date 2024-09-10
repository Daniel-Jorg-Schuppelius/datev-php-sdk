<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Individual;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class IndividualDatumRecord extends NamedEntity {
    protected ?string $long_field_name;
    protected ?string $short_field_name;
    protected ?DateTime $date;
    protected ?float $amount;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getLongFieldName(): ?string {
        return $this->long_field_name;
    }

    public function getShortFieldName(): ?string {
        return $this->short_field_name;
    }

    public function getDate(): ?DateTime {
        return $this->date;
    }

    public function getAmount(): ?float {
        return $this->amount;
    }
}
