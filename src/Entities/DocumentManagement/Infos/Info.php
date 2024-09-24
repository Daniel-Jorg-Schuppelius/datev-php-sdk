<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Infos;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\DocumentManagement\Versions\Versions;
use Psr\Log\LoggerInterface;

class Info extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?InfoID $id;
    protected ?string $environment;
    protected ?string $feature;
    protected ?Versions $versions;
    protected ?string $data_path;
    protected ?bool $is_client_installed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?InfoID {
        return $this->id ?? null;
    }
}
