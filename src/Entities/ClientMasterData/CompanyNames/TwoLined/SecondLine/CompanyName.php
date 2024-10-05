<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CompanyNames\TwoLined\SecondLine;

use Datev\Entities\ClientMasterData\CompanyNames\CompanyName as BaseCompanyName;
use Psr\Log\LoggerInterface;

class CompanyName extends BaseCompanyName {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_two_lined_company_name_second_line';
    }
}
