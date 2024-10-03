<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class DescriptionOfClassificationOfEconomicActivities2003 extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_description_of_classification_of_economic_activities_2003';
    }
}
