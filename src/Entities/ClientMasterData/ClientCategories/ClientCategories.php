<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategories;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class ClientCategories extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = ClientCategory::class;

        parent::__construct($data, $logger);
    }
}
