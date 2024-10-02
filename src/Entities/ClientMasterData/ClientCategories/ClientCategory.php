<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategories;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class ClientCategory extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ClientCategoryID $id;
    protected ClientCategoryTypeID $client_category_type_id;
    protected ?string $client_category_type_short_name;
    protected ClientID $client_id;
    protected ?string $client_name;
    protected ?int $client_number;
    protected ?Status $status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientCategoryID {
        return $this->id;
    }
}
