<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\IndividualReferences;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerGUID;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerLink;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;
use Exception;

class DocumentIndividualReference extends IndividualReference {
    public function getCorrespondencePartnerGUID(): ?CorrespondencePartnerGUID {
        throw new Exception("Not Supported in DocumentIndividualReference");
    }

    public function getCorrespondencePartnerLink(): ?CorrespondencePartnerLink {
        throw new Exception("Not Supported in DocumentIndividualReference");
    }
}
