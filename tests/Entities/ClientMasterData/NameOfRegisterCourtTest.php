<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NameOfRegisterCourtTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\{NameOfRegisterCourt, NamesOfRegisterCourt};
use Tests\Contracts\EntityTest;

class NameOfRegisterCourtTest extends EntityTest {
    public function test_create_name_of_register_court() {
        $data = [
            "value" => "Amtsgericht München",
            "valid_from" => "2024-01-01",
        ];

        $name = new NameOfRegisterCourt($data);
        $this->assertInstanceOf(NameOfRegisterCourt::class, $name);
    }

    public function test_create_names_of_register_court() {
        $data = [
            [
                "value" => "Amtsgericht München",
                "valid_from" => "2024-01-01",
            ],
        ];

        $names = new NamesOfRegisterCourt($data);
        $this->assertInstanceOf(NamesOfRegisterCourt::class, $names);
    }
}
