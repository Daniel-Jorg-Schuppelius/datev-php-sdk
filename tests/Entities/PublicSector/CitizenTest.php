<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CitizenTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Citizens\{Citizen, Citizens};
use Tests\Contracts\EntityTest;

class CitizenTest extends EntityTest {
    public function test_create_citizen() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "first_name" => "Max",
            "last_name" => "Mustermann",
        ];

        $citizen = new Citizen($data);
        $this->assertInstanceOf(Citizen::class, new Citizen);
        $this->assertInstanceOf(Citizen::class, $citizen);
    }

    public function test_create_citizens() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "first_name" => "Max",
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "first_name" => "Erika",
                ],
            ],
        ];

        $citizens = new Citizens($data);
        $this->assertInstanceOf(Citizens::class, $citizens);
        $this->assertCount(2, $citizens->getValues());
    }
}
