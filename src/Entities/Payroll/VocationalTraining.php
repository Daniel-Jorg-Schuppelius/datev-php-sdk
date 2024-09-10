<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class VocationalTraining extends NamedEntity implements IdentifiableInterface {
    protected VocationalTrainingID $id;
    protected string $personnel_number;
    protected ?float $amount;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): VocationalTrainingID {
        return $this->id;
    }
}
