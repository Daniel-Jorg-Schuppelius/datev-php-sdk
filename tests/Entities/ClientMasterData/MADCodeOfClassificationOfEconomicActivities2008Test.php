<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MADCodeOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\MADCodeOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\MADCodesOfClassificationOfEconomicActivities2008\MADCodesOfClassificationOfEconomicActivities2008;
use PHPUnit\Framework\TestCase;

class MADCodeOfClassificationOfEconomicActivities2008Test extends TestCase {
    public function testCreateMADCodeOfClassificationOfEconomicActivities2008(): void {
        $data = [
            "value" => "01.11",
            "valid_from" => "2020-01-01",
        ];

        $madCode = new MADCodeOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(MADCodeOfClassificationOfEconomicActivities2008::class, $madCode);
    }

    public function testCreateMADCodesOfClassificationOfEconomicActivities2008(): void {
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

        $madCodes = new MADCodesOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(MADCodesOfClassificationOfEconomicActivities2008::class, $madCodes);
        $this->assertCount(2, $madCodes->getValues());
    }
}
