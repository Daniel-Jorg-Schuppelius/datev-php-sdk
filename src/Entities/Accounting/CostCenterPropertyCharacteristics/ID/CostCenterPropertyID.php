<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterPropertyID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostCenterPropertyCharacteristics\ID;

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristicID as BaseCostCenterPropertyCharacteristicID;
use Psr\Log\LoggerInterface;

class CostCenterPropertyCharacteristicID extends BaseCostCenterPropertyCharacteristicID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'characteristic_id';
    }
}
