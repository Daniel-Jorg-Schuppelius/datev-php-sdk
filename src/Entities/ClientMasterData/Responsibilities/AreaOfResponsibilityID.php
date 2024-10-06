<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AreaOfResponsibilityID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Responsibilities;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilityID as BaseAreaOfResponsibilityID;
use Psr\Log\LoggerInterface;

class AreaOfResponsibilityID extends BaseAreaOfResponsibilityID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'area_of_responsibility_id';
    }
}
