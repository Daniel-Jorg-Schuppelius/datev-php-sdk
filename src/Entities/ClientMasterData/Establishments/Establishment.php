<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Establishment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Establishments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\ClientMasterData\ShortNames\ShortName;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Establishment extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?EstablishmentID $id;
    protected ?string $name;
    protected ?ShortName $short_name;
    protected ?Status $status;
    protected ?DateTime $timestamp;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EstablishmentID {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getShortName(): ?ShortName {
        return $this->short_name ?? null;
    }

    public function getStatus(): ?Status {
        return $this->status ?? null;
    }

    public function getTimestamp(): ?DateTime {
        return $this->timestamp ?? null;
    }
}
