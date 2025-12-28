<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\FiscalYears;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class FiscalYearID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = 'id';
        parent::__construct($data, $logger);
    }
}
