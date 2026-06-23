<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContactPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ContactPersons\{ContactPerson, ContactPersonID, ContactPersons};
use Tests\Contracts\EntityTest;

class ContactPersonTest extends EntityTest {
    public function test_create_contact_person_id() {
        $id = new ContactPersonID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(ContactPersonID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_contact_person() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "department" => "Buchhaltung",
            "display_name" => "Max Mustermann",
            "function" => "Leiter",
            "note" => "Ansprechpartner für Finanzen",
        ];

        $contactPerson = new ContactPerson($data);
        $this->assertInstanceOf(ContactPerson::class, $contactPerson);
        $this->assertInstanceOf(ContactPersonID::class, $contactPerson->getID());
    }

    public function test_create_contact_persons() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "department" => "Buchhaltung",
                "display_name" => "Max Mustermann",
                "note" => "",
            ],
        ];

        $contactPersons = new ContactPersons($data);
        $this->assertInstanceOf(ContactPersons::class, $contactPersons);
    }
}
