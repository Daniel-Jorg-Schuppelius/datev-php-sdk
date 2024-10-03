<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CompanyNames\ThirdLine;

use Datev\Entities\ClientMasterData\CompanyNames\CompanyName as BaseCompanyName;
use Psr\Log\LoggerInterface;

class CompanyName extends BaseCompanyName {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_three_lined_company_name_third_line';
    }
}
