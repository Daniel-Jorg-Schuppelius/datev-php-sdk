<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategoryTypes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class ClientCategoryTypes extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = ClientCategoryType::class;

        parent::__construct($data, $logger);
    }
}
