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

use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NameOfRegisterCourt;
use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NamesOfRegisterCourt;
use PHPUnit\Framework\TestCase;

class NameOfRegisterCourtTest extends TestCase {
    public function testCreateNameOfRegisterCourt() {
        $data = [
            "value" => "Amtsgericht München",
            "valid_from" => "2024-01-01"
        ];

        $name = new NameOfRegisterCourt($data);
        $this->assertInstanceOf(NameOfRegisterCourt::class, $name);
    }

    public function testCreateNamesOfRegisterCourt() {
        $data = [
            [
                "value" => "Amtsgericht München",
                "valid_from" => "2024-01-01"
            ]
        ];

        $names = new NamesOfRegisterCourt($data);
        $this->assertInstanceOf(NamesOfRegisterCourt::class, $names);
    }
}
