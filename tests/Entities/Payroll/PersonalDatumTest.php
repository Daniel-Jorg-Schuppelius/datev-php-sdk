<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PersonalDatumTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Data\Personal\PersonalDatum;

class PersonalDatumTest extends EntityTest {
    public function testCreatePersonalDatum(): void {
        $data = [
            "id" => "pd-001",
            "first_name" => "Max",
            "surname" => "Mustermann",
            "academic_title" => "Dr.",
            "date_of_birth" => "1985-06-15T00:00:00.000+00:00",
            "place_of_birth" => "Berlin",
            "country_of_birth" => "DE",
            "nationality" => "DE",
            "marital_status" => "married",
            "sex" => "male",
            "social_security_number" => "12345678901"
        ];

        $personalDatum = new PersonalDatum($data);

        $this->assertInstanceOf(PersonalDatum::class, $personalDatum);
        $this->assertEquals("Max", $personalDatum->getFirstName());
        $this->assertEquals("Mustermann", $personalDatum->getSurname());
        $this->assertEquals("Dr.", $personalDatum->getAcademicTitle());
        $this->assertEquals("Berlin", $personalDatum->getPlaceOfBirth());
    }
}
