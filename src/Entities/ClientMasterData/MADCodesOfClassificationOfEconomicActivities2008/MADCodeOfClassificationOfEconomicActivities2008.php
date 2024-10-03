<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008;

use Datev\Contracts\Abstracts\DateTimeNamedValue;
use Psr\Log\LoggerInterface;

class MADCodeOfClassificationOfEconomicActivities2008 extends DateTimeNamedValue {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_mad_code_of_classification_of_economic_activities_2008';
    }
}
