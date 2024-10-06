<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Error.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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

    public function getAdditionalMessages(): ?AdditionalMessages {
        return $this->additional_messages ?? null;
    }

    public function getError(): ?string {
        return $this->error ?? null;
    }

    public function getErrorDescription(): ?string {
        return $this->error_description ?? null;
    }

    public function getErrorUri(): ?ErrorURI {
        return $this->error_uri ?? null;
    }

    public function getRequestId(): ?RequestID {
        return $this->request_id ?? null;
    }
}
