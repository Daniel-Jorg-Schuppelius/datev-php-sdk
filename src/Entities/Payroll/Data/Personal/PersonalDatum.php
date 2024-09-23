<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Data\Personal;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class PersonalDatum extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected PersonalDataID $id;
    protected ?string $first_name;
    protected ?string $surname;
    protected ?string $academic_title;
    protected ?string $name_affix;
    protected ?string $name_prefix;
    protected ?string $birth_name;
    protected ?string $birth_name_affix;
    protected ?string $birth_name_prefix;
    protected ?DateTime $date_of_birth;
    protected ?string $place_of_birth;
    protected ?string $country_of_birth;
    protected ?string $nationality;
    protected ?string $marital_status;
    protected ?string $sex;
    protected ?string $social_security_number;
    protected ?DateTime $initial_day_of_entrance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): PersonalDataID {
        return $this->id;
    }
}
