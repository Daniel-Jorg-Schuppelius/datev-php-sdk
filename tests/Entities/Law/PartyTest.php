<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartyTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Parties\Party;
use Datev\Entities\Law\Parties\Parties;

class PartyTest extends EntityTest {
    public function testCreateParty() {
        $data = [
            "id" => "32e6f021-8174-42c3-9d1a-d5eb3b636a1d",
            "party_role_id" => "ebd93cfc-1c2e-4927-aee5-24b448b050fd",
            "party_role_link" => "https://localhost:58452/datev/api/law/v1/party-roles/ebd93cfc-1c2e-4927-aee5-24b448b050fd",
            "serial_number" => 1,
            "surname" => "Musterhinz",
            "first_name" => "Manfred",
            "address_id" => "4cf3c34a-d9a5-4942-a87a-a92c66543d8f",
            "sign" => "MaMu",
            "subject" => "Fristen, Termine, Wiedervorlagen",
            "entitled_to_deduct_input_vat" => false,
            "party_name" => "Manfred Musterhinz, Berliner Str. 3, 01067 Dresden",
            "party_name_modified" => true,
            "official_party_type" => "Kfz-Halter"
        ];

        $party = new Party($data);
        $this->assertInstanceOf(Party::class, new Party());
        $this->assertInstanceOf(Party::class, $party);
        $this->assertNotNull($party->getID());
        $this->assertEquals("Musterhinz", $party->getSurname());
        $this->assertEquals("Manfred", $party->getFirstName());
        $this->assertEquals(1, $party->getSerialNumber());
        $this->assertEquals("MaMu", $party->getSign());
        $this->assertFalse($party->isEntitledToDeductInputVat());
        $this->assertTrue($party->isPartyNameModified());
        $this->assertEquals("Kfz-Halter", $party->getOfficialPartyType());
    }

    public function testCreateParties() {
        $data = [
            "content" => [
                [
                    "id" => "32e6f021-8174-42c3-9d1a-d5eb3b636a1d",
                    "surname" => "Musterhinz",
                    "first_name" => "Manfred"
                ],
                [
                    "id" => "82b31bfc-7e44-4554-adb4-7c596d7e855b",
                    "surname" => "Traumustername",
                    "first_name" => "Ernst"
                ]
            ]
        ];

        $parties = new Parties($data);
        $this->assertInstanceOf(Parties::class, $parties);
        $this->assertCount(2, $parties->getValues());
    }
}
