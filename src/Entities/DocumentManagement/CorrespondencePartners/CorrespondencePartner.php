<?php

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
