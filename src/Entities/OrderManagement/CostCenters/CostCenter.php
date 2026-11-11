<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenter.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\OrderManagement\CostCenters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Entities\GUID;
use Psr\Log\LoggerInterface;

class CostCenter extends NamedEntity {
    protected ?GUID $id;
    protected ?string $cost_center_number;
    protected ?string $costcenter_name;
    protected ?GUID $organization_id;
    protected ?bool $isactive;
    protected ?string $costcenter_id;
    protected ?string $costcenter_name_short;
    protected ?bool $costcenter_active;
    protected ?string $costcenter_group;
    protected ?string $responsible_costcenter;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?GUID {
        return $this->id ?? null;
    }

    public function getCostCenterNumber(): ?string {
        return $this->cost_center_number ?? null;
    }

    public function getCostCenterName(): ?string {
        return $this->costcenter_name ?? null;
    }

    public function getOrganizationID(): ?GUID {
        return $this->organization_id ?? null;
    }

    public function isActive(): ?bool {
        return $this->isactive ?? null;
    }

    public function getCostcenterId(): ?string {
        return $this->costcenter_id ?? null;
    }

    public function getCostcenterNameShort(): ?string {
        return $this->costcenter_name_short ?? null;
    }

    public function isCostcenterActive(): ?bool {
        return $this->costcenter_active ?? null;
    }

    public function getCostcenterGroup(): ?string {
        return $this->costcenter_group ?? null;
    }

    public function getResponsibleCostcenter(): ?string {
        return $this->responsible_costcenter ?? null;
    }
}
