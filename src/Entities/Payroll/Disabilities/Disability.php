<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Disabilities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Disability extends NamedEntity implements IdentifiableInterface {
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
}