<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\ReasonsForAbsence;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class ReasonForAbsence extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ReasonForAbsenceID $id;
    protected ?string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ReasonForAbsenceID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}
