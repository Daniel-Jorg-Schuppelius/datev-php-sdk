<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReadingData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionMeterReadings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class TransactionMeterReadingData extends NamedEntity {
    protected ?string $meter_id;
    protected ?string $identification_number;
    protected ?DateTime $date;
    protected ?float $value;
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

    public function getMeterId(): ?string {
        return $this->meter_id ?? null;
    }

    public function getIDentificationNumber(): ?string {
        return $this->identification_number ?? null;
    }

    public function getDate(): ?DateTime {
        return $this->date ?? null;
    }

    public function getValue(): ?float {
        return $this->value ?? null;
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

    public function getOverrun(): ?bool {
        return $this->overrun ?? null;
    }

    public function getReverseRunning(): ?bool {
        return $this->reverse_running ?? null;
    }

    public function getInitialised(): ?bool {
        return $this->initialised ?? null;
    }

    public function getReader(): ?string {
        return $this->reader ?? null;
    }

    public function getCommentForNotification(): ?string {
        return $this->comment_for_notification ?? null;
    }

    public function getComment(): ?string {
        return $this->comment ?? null;
    }
}
