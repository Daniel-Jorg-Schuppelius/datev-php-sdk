<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoryTypeID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategoryTypes\ID;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryTypeID as BaseClientCategoryTypeID;
use Psr\Log\LoggerInterface;

class ClientCategoryTypeID extends BaseClientCategoryTypeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'client_category_type_id';
    }
}
