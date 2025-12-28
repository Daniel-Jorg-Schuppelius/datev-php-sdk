<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecordID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostAccountingRecords;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class CostAccountingRecordID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = 'id';
        parent::__construct($data, $logger);
    }
}
