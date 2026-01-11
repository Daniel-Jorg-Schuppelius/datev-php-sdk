<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HealthTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Health\Health;

class HealthTest extends EntityTest {
    
    public function testCreateHealth(): void {
        $data = [
            "status" => "ok",
            "version" => "1.0.0"
        ];

        $health = new Health($data);

        $this->assertInstanceOf(Health::class, $health);
        $this->assertEquals("ok", $health->getStatus());
        $this->assertEquals("1.0.0", $health->getVersion());
        $this->assertTrue($health->isHealthy());
    }

    public function testUnhealthyStatus(): void {
        $data = [
            "status" => "error",
            "version" => "1.0.0"
        ];

        $health = new Health($data);

        $this->assertInstanceOf(Health::class, $health);
        $this->assertFalse($health->isHealthy());
    }
}
