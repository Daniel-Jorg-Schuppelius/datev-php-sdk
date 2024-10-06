<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms\ID;

use DateTime;
use Datev\Entities\ClientMasterData\LegalForms\LegalFormID as BaseLegalFormID;
use Psr\Log\LoggerInterface;

class LegalFormID extends BaseLegalFormID {
    protected ?DateTime $valid_from;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_legal_form_id';
    }
}
