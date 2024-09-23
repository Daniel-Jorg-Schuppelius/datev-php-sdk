<?php

declare(strict_types=1);

namespace Datev\Entities\Common\Errors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessages;
use Datev\Entities\Common\RequestID;
use Psr\Log\LoggerInterface;

class Error extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AdditionalMessages $additional_messages;
    protected ?string $error;
    protected ?string $error_description;
    protected ?ErrorURI $error_uri;
    protected ?RequestID $request_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RequestID {
        return $this->request_id;
    }
}
