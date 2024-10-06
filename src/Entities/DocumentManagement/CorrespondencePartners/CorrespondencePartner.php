<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorrespondencePartner.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\CorrespondencePartners;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class CorrespondencePartner extends NamedEntity {
    protected ?string $domain;
    protected ?CorrespondencePartnerLink $link;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function toArray(): array {
        return [
            'domain' => $this->domain,
            'link' => $this->link->getValue()
        ];
    }

    public function getDomain(): ?string {
        return $this->domain ?? null;
    }

    public function getLink(): ?CorrespondencePartnerLink {
        return $this->link ?? null;
    }
}
