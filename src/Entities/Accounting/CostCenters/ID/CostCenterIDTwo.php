<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostCenters\ID;

use Datev\Entities\Accounting\CostCenters\CostCenterID as BaseCostCenterID;
use Psr\Log\LoggerInterface;

class CostCenterIDTwo extends BaseCostCenterID {
    /**
     * @param mixed $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'kost2_cost_center_id';
    }
}
