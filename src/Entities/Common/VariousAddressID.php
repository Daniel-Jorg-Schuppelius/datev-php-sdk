<?php
/*
 * Created on   : Thu Mar 27 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddressID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class VariousAddressID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'various_address_id';
    }
}
