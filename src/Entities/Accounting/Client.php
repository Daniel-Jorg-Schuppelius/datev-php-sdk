<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableInterface {
    protected ?ClientID $id;
    protected ?string $name;
    protected ?int $number;
    protected CompanyData $company_data;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientID {
        return $this->id;
    }
}