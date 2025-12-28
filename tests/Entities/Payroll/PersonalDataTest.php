<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PersonalDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Data\Personal\PersonalData;
use Datev\Entities\Payroll\Data\Personal\PersonalDataID;
use Datev\Entities\Payroll\Data\Personal\PersonalDatum;
use PHPUnit\Framework\TestCase;

class PersonalDataTest extends TestCase {
    public function testCreatePersonalDataID(): void {
        $id = new PersonalDataID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(PersonalDataID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function testCreatePersonalDatum(): void {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "first_name" => "Max",
            "surname" => "Mustermann",
            "academic_title" => "Dr.",
            "date_of_birth" => "1985-05-15",
            "place_of_birth" => "Berlin",
            "country_of_birth" => "DE",
            "nationality" => "DE",
            "marital_status" => "single",
            "sex" => "male",
            "social_security_number" => "12345678901",
        ];

        $personalDatum = new PersonalDatum($data);
        $this->assertInstanceOf(PersonalDatum::class, $personalDatum);
        $this->assertEquals("Max", $personalDatum->getFirstName());
    }

    public function testCreatePersonalData(): void {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "first_name" => "Max",
                "surname" => "Mustermann",
            ],
            [
                "id" => "87654321-4321-4321-4321-210987654321",
                "first_name" => "Erika",
                "surname" => "Musterfrau",
            ],
        ];

        $personalData = new PersonalData($data);
        $this->assertInstanceOf(PersonalData::class, $personalData);
        $this->assertCount(2, $personalData->getValues());
    }
}
