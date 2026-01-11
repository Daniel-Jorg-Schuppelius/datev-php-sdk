<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CauseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Causes\Cause;
use Datev\Entities\Law\Causes\Causes;

class CauseTest extends EntityTest {
    public function testCreateCause() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "name" => "Rechtsstreit Müller",
            "departments" => ["Zivilrecht", "Arbeitsrecht"]
        ];

        $cause = new Cause($data);
        $this->assertInstanceOf(Cause::class, new Cause());
        $this->assertInstanceOf(Cause::class, $cause);
        $this->assertEquals("Rechtsstreit Müller", $cause->getName());
        $this->assertIsArray($cause->getDepartments());
    }

    public function testCreateCauses() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "name" => "Fall 1"
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "name" => "Fall 2"
                ]
            ]
        ];

        $causes = new Causes($data);
        $this->assertInstanceOf(Causes::class, $causes);
        $this->assertCount(2, $causes->getValues());
    }
}
