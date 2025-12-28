<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReading.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionMeterReadings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class TransactionMeterReading extends NamedEntity {
    protected ?int $id;
    protected ?string $status;
    protected ?string $type;
    protected ?string $notification_e_mail;
    protected ?TransactionMeterReadingData $meter_reading;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getStatus(): ?string {
        return $this->status ?? null;
    }

    public function getType(): ?string {
        return $this->type ?? null;
    }

    public function getNotificationEmail(): ?string {
        return $this->notification_e_mail ?? null;
    }

    public function getMeterReading(): ?TransactionMeterReadingData {
        return $this->meter_reading ?? null;
    }
}
