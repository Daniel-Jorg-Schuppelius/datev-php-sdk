<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Fees\{Fee, Fees};
use Tests\Contracts\EntityTest;

class FeeTest extends EntityTest {
    public function test_create_fee() {
        $data = [
            "id" => 1,
            "fee_position" => "2300",
            "fee_position_name" => "Buchführung",
            "fee_plan_number" => 100,
            "fee_plan_name" => "Standardgebührenordnung",
            "factor_from" => 0.5,
            "factor_to" => 3.0,
            "default_factor" => 1.0,
        ];

        $fee = new Fee($data);
        $this->assertInstanceOf(Fee::class, new Fee);
        $this->assertInstanceOf(Fee::class, $fee);
        $this->assertEquals(1, $fee->getID());
        $this->assertEquals("2300", $fee->getFeePosition());
        $this->assertEquals("Buchführung", $fee->getFeePositionName());
    }

    public function test_create_fees() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "fee_position" => "2300",
                ],
                [
                    "id" => 2,
                    "fee_position" => "2301",
                ],
            ],
        ];

        $fees = new Fees($data);
        $this->assertInstanceOf(Fees::class, $fees);
        $this->assertCount(2, $fees->getValues());
    }
}
