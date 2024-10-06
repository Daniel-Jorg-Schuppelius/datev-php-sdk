<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualDatumRecord.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
