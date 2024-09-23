<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualReferences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\CorrespondencePartnerGUID;
use Psr\Log\LoggerInterface;

class IndividualReference extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected IndividualReferenceID $id;
    protected string $name;
    protected ?CorrespondencePartnerGUID $correspondence_partner_guid;
    protected ?CorrespondencePartnerLink $correspondence_partner_link;


    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): IndividualReferenceID {
        return $this->id;
    }
}
