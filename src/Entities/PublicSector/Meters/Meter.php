<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Meter.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Meters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class Meter extends NamedEntity {
    protected ?string $id;
    protected ?string $number;
    protected ?string $meter_number;
    protected ?DateTime $installation_date;
    protected ?string $usagetype;
    protected ?string $effect_on_billing;
    protected ?DateTime $first_date;
    protected ?DateTime $last_date;
    protected ?string $changed_reason;
    protected ?MeterType $meter_type;
    protected ?string $manufacturer;
    protected ?int $year_of_manufacture;
    protected ?int $year_of_calibration;
    protected ?string $owner;
    protected ?string $comment;
    protected ?string $orientation;
    protected ?MeterLocalization $localization;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getMeterNumber(): ?string {
        return $this->meter_number ?? null;
    }

    public function getInstallationDate(): ?DateTime {
        return $this->installation_date ?? null;
    }

    public function getMeterType(): ?MeterType {
        return $this->meter_type ?? null;
    }

    public function getManufacturer(): ?string {
        return $this->manufacturer ?? null;
    }

    public function getYearOfManufacture(): ?int {
        return $this->year_of_manufacture ?? null;
    }

    public function getYearOfCalibration(): ?int {
        return $this->year_of_calibration ?? null;
    }

    public function getOwner(): ?string {
        return $this->owner ?? null;
    }

    public function getLocalization(): ?MeterLocalization {
        return $this->localization ?? null;
    }
}
