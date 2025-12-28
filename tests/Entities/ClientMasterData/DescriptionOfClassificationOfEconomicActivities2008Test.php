<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DescriptionOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionsOfClassificationOfEconomicActivities2008;
use PHPUnit\Framework\TestCase;

class DescriptionOfClassificationOfEconomicActivities2008Test extends TestCase {
    public function testCreateDescriptionOfClassificationOfEconomicActivities2008(): void {
        $data = [
            "value" => "Anbau von Getreide",
            "valid_from" => "2020-01-01",
        ];

        $description = new DescriptionOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(DescriptionOfClassificationOfEconomicActivities2008::class, $description);
    }

    public function testCreateDescriptionsOfClassificationOfEconomicActivities2008(): void {
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

        $descriptions = new DescriptionsOfClassificationOfEconomicActivities2008($data);
        $this->assertInstanceOf(DescriptionsOfClassificationOfEconomicActivities2008::class, $descriptions);
        $this->assertCount(2, $descriptions->getValues());
    }
}
