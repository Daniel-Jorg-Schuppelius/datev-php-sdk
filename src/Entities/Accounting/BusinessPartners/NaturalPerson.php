<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NaturalPerson.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\BusinessPartners;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class NaturalPerson extends NamedEntity {
    protected ?DateTime $date_of_birth;
    protected ?string $degree;
    protected ?string $firstname;
    protected ?string $name_prefix;
    protected ?string $surname;
    protected ?string $title_of_nobility;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDateOfBirth(): ?DateTime {
        return $this->date_of_birth ?? null;
    }

    public function getDegree(): ?string {
        return $this->degree ?? null;
    }

    public function getFirstname(): ?string {
        return $this->firstname ?? null;
    }

    public function getNamePrefix(): ?string {
        return $this->name_prefix ?? null;
    }

    public function getSurname(): ?string {
        return $this->surname ?? null;
    }

    public function getTitleOfNobility(): ?string {
        return $this->title_of_nobility ?? null;
    }
}
