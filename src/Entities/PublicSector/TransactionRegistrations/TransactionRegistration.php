<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistration.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionRegistrations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class TransactionRegistration extends NamedEntity {
    protected ?int $id;
    protected ?string $status;
    protected ?string $notification_e_mail;
    protected ?TransactionRegistrationData $registration;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getStatus(): ?string {
        return $this->status ?? null;
    }

    public function getNotificationEmail(): ?string {
        return $this->notification_e_mail ?? null;
    }

    public function getRegistration(): ?TransactionRegistrationData {
        return $this->registration ?? null;
    }
}
