<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EstablishmentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Establishments\Establishment;
use Datev\Entities\ClientMasterData\Establishments\EstablishmentID;
use Datev\Entities\ClientMasterData\Establishments\Establishments;
use PHPUnit\Framework\TestCase;

class EstablishmentTest extends TestCase {
    public function testCreateEstablishmentID() {
        $id = new EstablishmentID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(EstablishmentID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function testCreateEstablishment() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "name" => "Hauptniederlassung",
            "number" => 1
        ];

        $establishment = new Establishment($data);
        $this->assertInstanceOf(Establishment::class, $establishment);
    }

    public function testCreateEstablishments() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "name" => "Hauptniederlassung",
                "number" => 1
            ]
        ];

        $establishments = new Establishments($data);
        $this->assertInstanceOf(Establishments::class, $establishments);
    }
}
