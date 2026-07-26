<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RegistrationNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegistrationNumbers\{RegistrationNumber, RegistrationNumbers};
use Tests\Contracts\EntityTest;

class RegistrationNumberTest extends EntityTest {
    public function test_create_registration_number(): void {
        $data = [
            "value" => "HRB 12345",
            "valid_from" => "2024-01-01",
        ];

        $number = new RegistrationNumber($data);
        $this->assertInstanceOf(RegistrationNumber::class, $number);
    }

    public function test_create_registration_numbers(): void {
        $data = [
            [
                "value" => "HRB 12345",
                "valid_from" => "2024-01-01",
            ],
        ];

        $numbers = new RegistrationNumbers($data);
        $this->assertInstanceOf(RegistrationNumbers::class, $numbers);
    }
}
