<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Citizen.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Citizens;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use DateTime;
use Datev\Entities\PublicSector\Common\Location;
use Psr\Log\LoggerInterface;

class Citizen extends NamedEntity {
    protected ?GUID $id;
    protected ?int $account_number;
    protected ?string $registration_id;
    protected ?int $account_number_short;
    protected ?string $first_name;
    protected ?string $last_name;
    protected ?string $email;
    protected ?string $mobile_phone;
    protected ?DateTime $date_of_birth;
    protected ?Location $location;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?GUID {
        return $this->id ?? null;
    }

    public function getAccountNumber(): ?int {
        return $this->account_number ?? null;
    }

    public function getRegistrationId(): ?string {
        return $this->registration_id ?? null;
    }

    public function getAccountNumberShort(): ?int {
        return $this->account_number_short ?? null;
    }

    public function getFirstName(): ?string {
        return $this->first_name ?? null;
    }

    public function getLastName(): ?string {
        return $this->last_name ?? null;
    }

    public function getEmail(): ?string {
        return $this->email ?? null;
    }

    public function getMobilePhone(): ?string {
        return $this->mobile_phone ?? null;
    }

    public function getDateOfBirth(): ?DateTime {
        return $this->date_of_birth ?? null;
    }

    public function getLocation(): ?Location {
        return $this->location ?? null;
    }
}
