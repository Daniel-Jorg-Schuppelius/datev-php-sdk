<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\DistributionOfProfits;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class DistributionOfProfits extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DistributionOfProfit::class;

        parent::__construct($data, $logger);
    }
}
