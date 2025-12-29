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
    protected ?string $cost_center_name;
    protected ?GUID $organization_id;
    protected ?bool $isactive;

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
        return $this->cost_center_name ?? null;
    }

    public function getOrganizationID(): ?GUID {
        return $this->organization_id ?? null;
    }

    public function isActive(): ?bool {
        return $this->isactive ?? null;
    }
}
