<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Notification.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Notifications;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\PublicSector\Common\Location;
use Psr\Log\LoggerInterface;

class Notification extends NamedEntity {
    protected ?string $id;
    protected ?string $number;
    protected ?DateTime $date;
    protected ?string $state;
    protected ?string $type;
    protected ?string $fee_type_list;
    protected ?Location $location;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getState(): ?string {
        return $this->state ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getFeeTypeList(): ?string {
        return $this->fee_type_list ?? null;
    }

    public function getLocation(): ?Location {
        return $this->location ?? null;
    }
}
