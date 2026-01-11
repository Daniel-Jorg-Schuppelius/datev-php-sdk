<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DueTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Dues\Due;
use Datev\Entities\PublicSector\Dues\Dues;

class DueTest extends EntityTest {
    public function testCreateDue() {
        $data = [
            "amount" => 250.75,
            "date" => "2024-02-15T00:00:00.000+00:00"
        ];

        $due = new Due($data);
        $this->assertInstanceOf(Due::class, new Due());
        $this->assertInstanceOf(Due::class, $due);
        $this->assertEquals(250.75, $due->getAmount());
    }

    public function testCreateDues() {
        $data = [
            "content" => [
                [
                    "amount" => 250.75
                ],
                [
                    "amount" => 180.00
                ]
            ]
        ];

        $dues = new Dues($data);
        $this->assertInstanceOf(Dues::class, $dues);
        $this->assertCount(2, $dues->getValues());
    }
}
