<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenter.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExports\MasterData;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Kostenstelle des Arbeitnehmers.
 */
class CostCenter extends NamedEntity {
    protected string $cost_center_id;

    protected string $cost_center_name;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getCostCenterId(): ?string {
        return $this->cost_center_id ?? null;
    }

    public function getCostCenterName(): ?string {
        return $this->cost_center_name ?? null;
    }
}
