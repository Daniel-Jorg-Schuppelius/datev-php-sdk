<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : KindOfRegisterCourtTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\KindOfRegisterCourts\{KindOfRegisterCourt, KindOfRegisterCourts};
use Tests\Contracts\EntityTest;

class KindOfRegisterCourtTest extends EntityTest {
    public function test_create_kind_of_register_court(): void {
        $data = [
            "value" => "HRB",
            "valid_from" => "2024-01-01",
        ];

        $kind = new KindOfRegisterCourt($data);
        $this->assertInstanceOf(KindOfRegisterCourt::class, $kind);
    }

    public function test_create_kind_of_register_courts(): void {
        $data = [
            [
                "value" => "HRB",
                "valid_from" => "2024-01-01",
            ],
        ];

        $kinds = new KindOfRegisterCourts($data);
        $this->assertInstanceOf(KindOfRegisterCourts::class, $kinds);
    }
}
