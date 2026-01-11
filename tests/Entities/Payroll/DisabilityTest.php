<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DisabilityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Disabilities\Disability;
use Datev\Entities\Payroll\Disabilities\Disabilities;
use Datev\Entities\Payroll\Disabilities\DisabilityID;

class DisabilityTest extends EntityTest {
    public function testCreateDisability(): void {
        $data = [
            "id" => "dis-001",
            "degree_of_disability" => 50.0,
            "issuing_authority" => "Versorgungsamt München",
            "disability_group" => "Schwerbehindert"
        ];

        $disability = new Disability($data);

        $this->assertInstanceOf(Disability::class, $disability);
        $this->assertInstanceOf(DisabilityID::class, $disability->getID());
        $this->assertEquals("dis-001", $disability->getID()->getValue());
        $this->assertEquals(50.0, $disability->getDegreeOfDisability());
        $this->assertEquals("Versorgungsamt München", $disability->getIssuingAuthority());
        $this->assertEquals("Schwerbehindert", $disability->getDisabilityGroup());
    }

    public function testCreateDisabilities(): void {
        $data = [
            "content" => [
                [
                    "id" => "dis-001",
                    "degree_of_disability" => 50.0,
                    "disability_group" => "Schwerbehindert"
                ],
                [
                    "id" => "dis-002",
                    "degree_of_disability" => 30.0,
                    "disability_group" => "Gleichgestellt"
                ]
            ]
        ];

        $disabilities = new Disabilities($data);

        $this->assertInstanceOf(Disabilities::class, $disabilities);
        $this->assertCount(2, $disabilities);
        $this->assertInstanceOf(Disability::class, $disabilities->getValues()[0]);
    }
}
