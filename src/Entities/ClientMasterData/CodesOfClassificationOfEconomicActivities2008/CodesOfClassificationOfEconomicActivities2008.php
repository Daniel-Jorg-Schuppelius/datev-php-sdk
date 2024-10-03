<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class CodesOfClassificationOfEconomicActivities2008 extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CodeOfClassificationOfEconomicActivities2008::class;

        parent::__construct($data, $logger);
    }
}
