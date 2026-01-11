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

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Fees\Fee;
use Datev\Entities\PublicSector\Fees\Fees;

class FeeTest extends EntityTest {
    public function testCreateFee() {
        $data = [
            "id" => 123,
            "fee_name" => "Wassergebühr",
            "type_name" => "water"
        ];

        $fee = new Fee($data);
        $this->assertInstanceOf(Fee::class, new Fee());
        $this->assertInstanceOf(Fee::class, $fee);
        $this->assertEquals(123, $fee->getID());
        $this->assertEquals("Wassergebühr", $fee->getFeeName());
    }

    public function testCreateFees() {
        $data = [
            "content" => [
                [
                    "id" => 1
                ],
                [
                    "id" => 2
                ]
            ]
        ];

        $fees = new Fees($data);
        $this->assertInstanceOf(Fees::class, $fees);
        $this->assertCount(2, $fees->getValues());
    }
}
