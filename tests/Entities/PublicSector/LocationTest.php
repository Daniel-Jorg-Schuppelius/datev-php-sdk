<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LocationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Common\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase {
    public function testCreateLocation(): void {
        $data = [
            "id" => 1,
            "description" => "Hauptstandort",
            "street" => "Musterstraße",
            "street_number" => "123",
            "postal_code" => "12345",
            "city" => "Berlin",
        ];

        $location = new Location($data);
        $this->assertInstanceOf(Location::class, $location);
        $this->assertEquals(1, $location->getID());
        $this->assertEquals("Hauptstandort", $location->getDescription());
        $this->assertEquals("Musterstraße", $location->getStreet());
    }
}
