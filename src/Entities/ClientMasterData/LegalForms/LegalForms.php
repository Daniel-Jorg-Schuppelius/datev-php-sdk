<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class LegalForms extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = LegalForm::class;

        parent::__construct($data, $logger);
    }
}
