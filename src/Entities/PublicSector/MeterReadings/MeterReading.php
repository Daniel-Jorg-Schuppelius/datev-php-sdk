<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterReading.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\MeterReadings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class MeterReading extends NamedEntity {
    protected ?string $id;
    protected ?DateTime $date;
    protected ?DateTime $reading_date;
    protected ?int $date_serial_number;
    protected ?float $value;
    protected ?float $reading_value;
    protected ?string $reading_reason;
    protected ?bool $is_estimated;
    protected ?float $consumption;
    protected ?string $relevance;
    protected ?string $sign;
    protected ?string $reason;
    protected ?bool $overrun;
    protected ?bool $reverse_running;
    protected ?bool $initialised;
    protected ?string $reader;
    protected ?string $comment_for_notification;
    protected ?string $comment;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getValue(): ?float {
        return $this->value ?? null;
    }

    public function getReadingValue(): ?float {
        return $this->reading_value ?? null;
    }

    public function getReadingDate(): ?DateTime {
        return $this->reading_date ?? null;
    }

    public function getReadingReason(): ?string {
        return $this->reading_reason ?? null;
    }

    public function getIsEstimated(): ?bool {
        return $this->is_estimated ?? null;
    }

    public function getConsumption(): ?float {
        return $this->consumption ?? null;
    }

    public function getRelevance(): ?string {
        return $this->relevance ?? null;
    }

    public function getSign(): ?string {
        return $this->sign ?? null;
    }

    public function getReason(): ?string {
        return $this->reason ?? null;
    }

    public function getReader(): ?string {
        return $this->reader ?? null;
    }

    public function isOverrun(): ?bool {
        return $this->overrun ?? null;
    }
}
