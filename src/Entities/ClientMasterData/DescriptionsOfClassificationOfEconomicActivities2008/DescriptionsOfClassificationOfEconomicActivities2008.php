<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class DescriptionsOfClassificationOfEconomicActivities2008 extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DescriptionOfClassificationOfEconomicActivities2008::class;

        parent::__construct($data, $logger);
    }
}
