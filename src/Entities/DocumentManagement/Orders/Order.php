<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Orders;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class Order extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected OrderID $id;
    protected ?string $name;
    protected ?DateTime $assessment_year;
    protected ?DateTime $creation_year;
    protected int $number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): OrderID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }
}
