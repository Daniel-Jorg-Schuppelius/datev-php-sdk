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

use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourt;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourts;
use PHPUnit\Framework\TestCase;

class KindOfRegisterCourtTest extends TestCase {
    public function testCreateKindOfRegisterCourt() {
        $data = [
            "value" => "HRB",
            "valid_from" => "2024-01-01"
        ];

        $kind = new KindOfRegisterCourt($data);
        $this->assertInstanceOf(KindOfRegisterCourt::class, $kind);
    }

    public function testCreateKindOfRegisterCourts() {
        $data = [
            [
                "value" => "HRB",
                "valid_from" => "2024-01-01"
            ]
        ];

        $kinds = new KindOfRegisterCourts($data);
        $this->assertInstanceOf(KindOfRegisterCourts::class, $kinds);
    }
}
