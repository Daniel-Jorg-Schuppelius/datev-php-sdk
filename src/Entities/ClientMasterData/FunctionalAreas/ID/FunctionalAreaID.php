<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FunctionalAreaID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\FunctionalAreas\ID;

use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalAreaID as BaseFunctionalAreaID;
use Psr\Log\LoggerInterface;

class FunctionalAreaID extends BaseFunctionalAreaID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'functional_area_id';
    }
}
