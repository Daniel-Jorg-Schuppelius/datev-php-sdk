<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CodesOfClassificationOfEconomicActivities2003Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2003\CodeOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2003\CodesOfClassificationOfEconomicActivities2003;

class CodesOfClassificationOfEconomicActivities2003Test extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_code_of_classification_of_economic_activities_2003" => "47.11"],
                ["current_code_of_classification_of_economic_activities_2003" => "47.19"]
            ]
        ];

        $codes = new CodesOfClassificationOfEconomicActivities2003($data);

        $this->assertCount(2, $codes->getValues());
        $this->assertInstanceOf(CodeOfClassificationOfEconomicActivities2003::class, $codes->getValues()[0]);
    }
}
