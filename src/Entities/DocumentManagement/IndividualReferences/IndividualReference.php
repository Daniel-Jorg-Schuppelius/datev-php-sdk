<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualReference.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\IndividualReferences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerGUID;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerLink;
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

    public function getName(): string {
        return $this->name;
    }

    public function getCorrespondencePartnerGUID(): ?CorrespondencePartnerGUID {
        return $this->correspondence_partner_guid;
    }

    public function getCorrespondencePartnerLink(): ?CorrespondencePartnerLink {
        return $this->correspondence_partner_link;
    }
}
