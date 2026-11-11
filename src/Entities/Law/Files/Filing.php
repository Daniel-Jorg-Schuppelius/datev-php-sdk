<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Filing.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Files;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class Filing extends NamedEntity {
    protected ?DateTime $date;
    protected ?string $number;
    protected ?DateTime $retention_period_end;
    protected ?string $location;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getNumber(): ?string {
        return $this->number ?? null;
    }

    public function getRetentionPeriodEnd(): ?DateTime {
        return $this->retention_period_end ?? null;
    }

    public function getLocation(): ?string {
        return $this->location ?? null;
    }
}
