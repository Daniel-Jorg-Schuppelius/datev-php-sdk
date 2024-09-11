<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\AcknowledgementUsers;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class AcknowledgementUser extends NamedEntity implements IdentifiableInterface {
    protected AcknowledgementUserID $id;
    protected ?string $name;
    protected ?DateTime $removed_acknowledgement;
    protected ?DateTime $acknowledged;
    protected ?bool $is_deleted;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AcknowledgementUserID {
        return $this->id;
    }
}
