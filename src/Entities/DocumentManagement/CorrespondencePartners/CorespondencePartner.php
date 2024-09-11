<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\CorrespondencePartners;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\Information\Link;
use Psr\Log\LoggerInterface;

class CorespondencePartner extends NamedEntity {
    protected ?string $domain;
    protected ?Link $link;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function toArray(): array {
        return [
            'domain' => $this->domain,
            'link' => $this->link->getValue()
        ];
    }
}
