<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTypeID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientGroupTypes\ID;

use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupTypeID as BaseClientGroupTypeID;
use Psr\Log\LoggerInterface;

class ClientGroupTypeID extends BaseClientGroupTypeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'client_group_type_id';
    }
}
