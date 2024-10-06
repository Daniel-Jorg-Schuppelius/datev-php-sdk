<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Disability.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\Disabilities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class Disability extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected DisabilityID $id;
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;
    protected ?float $degree_of_disability;
    protected ?string $issuing_authority;
    protected ?string $disability_group;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DisabilityID {
        return $this->id;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to ?? null;
    }

    public function getDegreeOfDisability(): ?float {
        return $this->degree_of_disability ?? null;
    }

    public function getIssuingAuthority(): ?string {
        return $this->issuing_authority ?? null;
    }

    public function getDisabilityGroup(): ?string {
        return $this->disability_group ?? null;
    }
}
