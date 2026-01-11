<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CitizensTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Citizens\Citizens;
use Datev\Entities\PublicSector\Citizens\Citizen;

class CitizensTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "cit-1",
                    "first_name" => "Max",
                    "last_name" => "Musterbürger"
                ],
                [
                    "id" => "cit-2",
                    "first_name" => "Erika",
                    "last_name" => "Musterbürgerin"
                ]
            ]
        ];

        $citizens = new Citizens($data);

        $this->assertCount(2, $citizens->getValues());
        $this->assertInstanceOf(Citizen::class, $citizens->getValues()[0]);
    }
}
