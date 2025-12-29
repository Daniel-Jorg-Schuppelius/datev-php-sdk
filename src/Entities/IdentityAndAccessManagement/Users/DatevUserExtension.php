<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DatevUserExtension.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\IdentityAndAccessManagement\Users;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class DatevUserExtension extends NamedEntity {
    protected ?DateTime $valid_from;
    protected ?DateTime $valid_to;
    protected ?string $initials;
    protected ?LinkedIdentity $linked_windows_identity;
    protected ?LinkedIdentity $linked_nuko_identity;
    protected ?LinkedIdentity $linked_employeeadministration_identity;
    protected ?LinkedDatacenterIdentity $linked_datacenter_identity;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getValidTo(): ?DateTime {
        return $this->valid_to ?? null;
    }

    public function getInitials(): ?string {
        return $this->initials ?? null;
    }

    public function getLinkedWindowsIdentity(): ?LinkedIdentity {
        return $this->linked_windows_identity ?? null;
    }

    public function getLinkedNukoIdentity(): ?LinkedIdentity {
        return $this->linked_nuko_identity ?? null;
    }

    public function getLinkedEmployeeadministrationIdentity(): ?LinkedIdentity {
        return $this->linked_employeeadministration_identity ?? null;
    }

    public function getLinkedDatacenterIdentity(): ?LinkedDatacenterIdentity {
        return $this->linked_datacenter_identity ?? null;
    }
}
