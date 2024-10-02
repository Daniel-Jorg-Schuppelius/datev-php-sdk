<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ClientCategories;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryTypeID as BaseClientCategoryTypeID;
use Psr\Log\LoggerInterface;

class ClientCategoryTypeID extends BaseClientCategoryTypeID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'client_category_type_id';
    }
}
