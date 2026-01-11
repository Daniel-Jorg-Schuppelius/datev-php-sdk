<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MADCodesOfClassificationOfEconomicActivities2003Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodesOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodeOfClassificationOfEconomicActivities2003;

class MADCodesOfClassificationOfEconomicActivities2003Test extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_mad_code_of_classification_of_economic_activities_2003" => "52.11"],
                ["current_mad_code_of_classification_of_economic_activities_2003" => "52.12"]
            ]
        ];

        $codes = new MADCodesOfClassificationOfEconomicActivities2003($data);

        $this->assertCount(2, $codes->getValues());
        $this->assertInstanceOf(MADCodeOfClassificationOfEconomicActivities2003::class, $codes->getValues()[0]);
    }
}
