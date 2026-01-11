<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AreaOfResponsibilityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;

class AreaOfResponsibilityTest extends EntityTest {
    public function testCreateAddress() {
        $data = [
            "id" => "NA",
            "name" => "Notariatsaufgaben",
            "description" => "Zuständigkeitsbereich wird nicht genutzt.",
            "standard" => true,
            "status" => "inactive"
        ];

        $areaOfResponsibility = new AreaOfResponsibility($data);
        $this->assertTrue($areaOfResponsibility->isValid());
        $this->assertInstanceOf(AreaOfResponsibility::class, new AreaOfResponsibility());
        $this->assertInstanceOf(AreaOfResponsibility::class, $areaOfResponsibility);
        $this->assertEquals($data, $areaOfResponsibility->toArray());
    }
}
