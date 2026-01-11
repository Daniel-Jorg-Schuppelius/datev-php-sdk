<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MADCodeOfClassificationOfEconomicActivities2003Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodeOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2003\MADCodesOfClassificationOfEconomicActivities2003;

class MADCodeOfClassificationOfEconomicActivities2003Test extends EntityTest {
    public function testCreateMADCodeOfClassificationOfEconomicActivities2003(): void {
        $data = [
            "value" => "01.11",
            "valid_from" => "2020-01-01",
        ];

        $madCode = new MADCodeOfClassificationOfEconomicActivities2003($data);
        $this->assertInstanceOf(MADCodeOfClassificationOfEconomicActivities2003::class, $madCode);
    }

    public function testCreateMADCodesOfClassificationOfEconomicActivities2003(): void {
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

        $madCodes = new MADCodesOfClassificationOfEconomicActivities2003($data);
        $this->assertInstanceOf(MADCodesOfClassificationOfEconomicActivities2003::class, $madCodes);
        $this->assertCount(2, $madCodes->getValues());
    }
}
