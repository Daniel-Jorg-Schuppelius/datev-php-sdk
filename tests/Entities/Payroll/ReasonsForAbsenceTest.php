<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonsForAbsenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\ReasonsForAbsence\{ReasonForAbsence, ReasonsForAbsence};
use Tests\Contracts\EntityTest;

class ReasonsForAbsenceTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Urlaub"],
                ["id" => 2, "name" => "Krankheit"],
            ],
        ];

        $reasons = new ReasonsForAbsence($data);

        $this->assertCount(2, $reasons->getValues());
        $this->assertInstanceOf(ReasonForAbsence::class, $reasons->getValues()[0]);
    }
}
