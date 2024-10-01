<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class MADCodesOfClassificationOfEconomicActivities2008 extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = MADCodeOfClassificationOfEconomicActivities2008::class;

        parent::__construct($data, $logger);
    }
}
