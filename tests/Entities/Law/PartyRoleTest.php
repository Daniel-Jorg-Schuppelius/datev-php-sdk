<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartyRoleTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\PartyRoles\{PartyRole, PartyRoles};
use Tests\Contracts\EntityTest;

class PartyRoleTest extends EntityTest {
    public function test_create_party_role(): void {
        $data = [
            "id" => "test-id",
            "number" => 1,
            "type" => "plaintiff",
            "short_name" => "KL",
            "name" => "Kläger",
        ];

        $partyRole = new PartyRole($data);

        $this->assertInstanceOf(PartyRole::class, $partyRole);
        $this->assertEquals(1, $partyRole->getNumber());
        $this->assertEquals("plaintiff", $partyRole->getType());
        $this->assertEquals("KL", $partyRole->getShortName());
        $this->assertEquals("Kläger", $partyRole->getName());
    }

    public function test_create_party_roles(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "short_name" => "KL",
                    "name" => "Kläger",
                ],
                [
                    "id" => "test-id-2",
                    "short_name" => "BK",
                    "name" => "Beklagter",
                ],
            ],
        ];

        $partyRoles = new PartyRoles($data);

        $this->assertInstanceOf(PartyRoles::class, $partyRoles);
        $this->assertCount(2, $partyRoles);
    }
}
