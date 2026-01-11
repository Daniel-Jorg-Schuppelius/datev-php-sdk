<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Parties\Parties;
use Datev\Entities\Law\Parties\Party;

class PartiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "party-1",
                    "surname" => "Mustermann",
                    "party_name" => "Max Mustermann"
                ],
                [
                    "id" => "party-2",
                    "surname" => "GmbH",
                    "party_name" => "Firma XY GmbH"
                ]
            ]
        ];

        $parties = new Parties($data);

        $this->assertCount(2, $parties->getValues());
        $this->assertInstanceOf(Party::class, $parties->getValues()[0]);
    }
}
