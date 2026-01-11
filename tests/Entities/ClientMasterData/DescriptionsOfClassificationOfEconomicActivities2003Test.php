<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DescriptionsOfClassificationOfEconomicActivities2003Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionsOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionOfClassificationOfEconomicActivities2003;

class DescriptionsOfClassificationOfEconomicActivities2003Test extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_description_of_classification_of_economic_activities_2003" => "Einzelhandel mit Waren verschiedener Art"],
                ["current_description_of_classification_of_economic_activities_2003" => "Großhandel mit Nahrungsmitteln"]
            ]
        ];

        $descriptions = new DescriptionsOfClassificationOfEconomicActivities2003($data);

        $this->assertCount(2, $descriptions->getValues());
        $this->assertInstanceOf(DescriptionOfClassificationOfEconomicActivities2003::class, $descriptions->getValues()[0]);
    }
}
