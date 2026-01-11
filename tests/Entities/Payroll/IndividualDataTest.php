<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Data\Individual\IndividualData;
use Datev\Entities\Payroll\Data\Individual\IndividualDatum;

class IndividualDataTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "long_field_name" => "Custom Field 1",
                    "short_field_name" => "CF1",
                    "date" => "2024-01-15",
                    "amount" => 100.50
                ],
                [
                    "id" => 2,
                    "long_field_name" => "Custom Field 2",
                    "short_field_name" => "CF2",
                    "date" => "2024-02-20",
                    "amount" => 250.00
                ]
            ]
        ];

        $individualData = new IndividualData($data);

        $this->assertCount(2, $individualData->getValues());
        $this->assertInstanceOf(IndividualDatum::class, $individualData->getValues()[0]);
    }
}
