<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Versions;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Version extends NamedEntity {
    protected ?string $name;
    protected ?string $number;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getNumber(): ?string {
        return $this->number;
    }
}
