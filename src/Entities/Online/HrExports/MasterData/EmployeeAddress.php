<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeAddress.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Anschrift des Arbeitnehmers.
 */
class EmployeeAddress extends NamedEntity {
    protected string $street;

    protected string $house_number;

    protected string $country;

    protected string $zip_code;

    protected string $city;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getStreet(): ?string {
        return $this->street ?? null;
    }

    public function getHouseNumber(): ?string {
        return $this->house_number ?? null;
    }

    public function getCountry(): ?string {
        return $this->country ?? null;
    }

    public function getZipCode(): ?string {
        return $this->zip_code ?? null;
    }

    public function getCity(): ?string {
        return $this->city ?? null;
    }
}
