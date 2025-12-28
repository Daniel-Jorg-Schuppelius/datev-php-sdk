<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterLocalization.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Meters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class MeterLocalization extends NamedEntity {
    protected ?string $is_located;
    protected ?string $location_description;
    protected ?string $building;
    protected ?DateTime $last_replacement_date;
    protected ?string $last_replacement_reason;
    protected ?string $comment;
    protected ?string $meter_purpose;
    protected ?string $reading_district;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getIsLocated(): ?string {
        return $this->is_located ?? null;
    }

    public function getLocationDescription(): ?string {
        return $this->location_description ?? null;
    }

    public function getBuilding(): ?string {
        return $this->building ?? null;
    }

    public function getLastReplacementDate(): ?DateTime {
        return $this->last_replacement_date ?? null;
    }

    public function getMeterPurpose(): ?string {
        return $this->meter_purpose ?? null;
    }

    public function getReadingDistrict(): ?string {
        return $this->reading_district ?? null;
    }
}
