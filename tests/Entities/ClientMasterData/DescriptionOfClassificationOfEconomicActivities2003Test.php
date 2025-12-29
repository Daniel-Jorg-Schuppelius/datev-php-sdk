<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DescriptionOfClassificationOfEconomicActivities2003Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionOfClassificationOfEconomicActivities2003;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2003\DescriptionsOfClassificationOfEconomicActivities2003;
use PHPUnit\Framework\TestCase;

class DescriptionOfClassificationOfEconomicActivities2003Test extends TestCase {
    public function testCreateDescriptionOfClassificationOfEconomicActivities2003(): void {
        $data = [
            "value" => "Anbau von Getreide",
            "valid_from" => "2020-01-01",
        ];

        $description = new DescriptionOfClassificationOfEconomicActivities2003($data);
        $this->assertInstanceOf(DescriptionOfClassificationOfEconomicActivities2003::class, $description);
    }

    public function testCreateDescriptionsOfClassificationOfEconomicActivities2003(): void {
        $data = [
            [
                "value" => "Anbau von Getreide",
                "valid_from" => "2020-01-01",
            ],
            [
                "value" => "Anbau von Reis",
                "valid_from" => "2021-01-01",
            ],
        ];

        $descriptions = new DescriptionsOfClassificationOfEconomicActivities2003($data);
        $this->assertInstanceOf(DescriptionsOfClassificationOfEconomicActivities2003::class, $descriptions);
        $this->assertCount(2, $descriptions->getValues());
    }
}
