<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\BatchResponse\Failed;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessages;
use Psr\Log\LoggerInterface;

class Reason extends NamedEntity implements IdentifiableInterface {
    protected ?string $error;
    protected ?string $error_description;
    protected ?RequestID $request_id;
    protected ?AdditionalMessages $additional_messages;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RequestID {
        return $this->request_id;
    }
}
