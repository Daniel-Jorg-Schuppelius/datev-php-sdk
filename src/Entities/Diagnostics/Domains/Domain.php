<?php

declare(strict_types=1);

namespace Datev\Entities\Diagnostics\Domains;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Domain extends NamedEntity {
    protected string $Key;
    protected string $Value;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
