<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategory.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategories;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\ClientCategoryTypes\ID\ClientCategoryTypeID;
use Datev\Entities\Common\Clients\ID\ClientID;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class ClientCategory extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ClientCategoryID $id;
    protected ClientCategoryTypeID $client_category_type_id;
    protected ?string $client_category_type_short_name;
    protected ClientID $client_id;
    protected ?string $client_name;
    protected ?int $client_number;
    protected ?Status $client_status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ClientCategoryID {
        return $this->id;
    }

    public function getClientCategoryTypeID(): ClientCategoryTypeID {
        return $this->client_category_type_id;
    }

    public function getClientCategoryTypeShortName(): ?string {
        return $this->client_category_type_short_name ?? null;
    }

    public function getClientID(): ClientID {
        return $this->client_id;
    }

    public function getClientName(): ?string {
        return $this->client_name ?? null;
    }

    public function getClientNumber(): ?int {
        return $this->client_number ?? null;
    }

    public function getClientStatus(): ?Status {
        return $this->client_status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
