<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistrationData.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\TransactionRegistrations;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class TransactionRegistrationData extends NamedEntity {
    protected ?string $id;
    protected ?bool $is_registered;
    protected ?string $registration_email;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?string {
        return $this->id ?? null;
    }

    public function isRegistered(): ?bool {
        return $this->is_registered ?? null;
    }

    public function getRegistrationEmail(): ?string {
        return $this->registration_email ?? null;
    }
}
