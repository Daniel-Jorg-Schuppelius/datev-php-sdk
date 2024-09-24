<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\CorrespondencePartners;

use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class CorrespondencePartnerGUID extends GUID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'correspondence_partner_guid';
    }
}
