<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualReferences;

use APIToolkit\Entities\Information\Link;
use Psr\Log\LoggerInterface;

class CorrespondencePartnerLink extends Link {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'correspondence_partner_link';
    }
}
