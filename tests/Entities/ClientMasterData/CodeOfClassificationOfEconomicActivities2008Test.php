<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CodeOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\{CodeOfClassificationOfEconomicActivities2008, CodesOfClassificationOfEconomicActivities2008};
use Tests\Contracts\EntityTest;

class CodeOfClassificationOfEconomicActivities2008Test extends EntityTest {
    public function test_create_code_of_classification_of_economic_activities2008(): void {
        $data = [
            "value" => "01.11",
            "valid_from" => "2020-01-01",
        ];

        $code = new CodeOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(CodeOfClassificationOfEconomicActivities2008::class, $code);
    }

    public function test_create_codes_of_classification_of_economic_activities2008(): void {
        $data = [
            [
                "value" => "01.11",
                "valid_from" => "2020-01-01",
            ],
            [
                "value" => "01.12",
                "valid_from" => "2021-01-01",
            ],
        ];

        $codes = new CodesOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(CodesOfClassificationOfEconomicActivities2008::class, $codes);
        $this->assertCount(2, $codes->getValues());
    }
}
