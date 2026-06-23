<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MADCodesOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\{MADCodeOfClassificationOfEconomicActivities2008, MADCodesOfClassificationOfEconomicActivities2008};
use Tests\Contracts\EntityTest;

class MADCodesOfClassificationOfEconomicActivities2008Test extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["current_mad_code_of_classification_of_economic_activities_2008" => "62.01"],
                ["current_mad_code_of_classification_of_economic_activities_2008" => "62.02"],
            ],
        ];

        $codes = new MADCodesOfClassificationOfEconomicActivities2008($data);

        $this->assertCount(2, $codes->getValues());
        $this->assertInstanceOf(MADCodeOfClassificationOfEconomicActivities2008::class, $codes->getValues()[0]);
    }
}
