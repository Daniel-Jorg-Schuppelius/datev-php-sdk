<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\ReasonsForAbsence;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class ReasonForAbsence extends NamedEntity implements IdentifiableInterface {
    protected ReasonForAbsenceID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ReasonForAbsenceID {
        return $this->id;
    }
}