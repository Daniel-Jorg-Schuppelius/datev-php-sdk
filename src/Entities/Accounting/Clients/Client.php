<?php

declare(strict_types=1);

namespace Datev\Entities\Accounting\Clients;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Accounting\CompanyData;
use Datev\Entities\ClientMasterData\Clients\ClientID;
use Psr\Log\LoggerInterface;

class Client extends NamedEntity implements IdentifiableNamedEntityInterface {
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