<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\ConsultantNumber;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableInterface {
    protected ClientID $id;
    protected int $number;
    protected ConsultantNumber $consultant_number;
    protected string $name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientID {
        return $this->id;
    }

    public function getNumber(): int {
        return $this->number;
    }
}
