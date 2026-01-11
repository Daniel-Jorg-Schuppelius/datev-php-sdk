<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DescriptionsOfClassificationOfEconomicActivities2008.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

/**
 * @extends DateTimeNamedValues<DescriptionOfClassificationOfEconomicActivities2008>
 */
class DescriptionsOfClassificationOfEconomicActivities2008 extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DescriptionOfClassificationOfEconomicActivities2008::class;

        parent::__construct($data, $logger);
    }
}
