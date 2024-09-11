<?php

declare(strict_types=1);

namespace Datev\Entities\Common\AdditionalMessages;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class AdditionalMessage extends NamedEntity implements IdentifiableInterface {
    protected ?AdditionalMessageID $id;
    protected ?string $description;
    protected ?string $severity;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AdditionalMessageID {
        return $this->id;
    }
}