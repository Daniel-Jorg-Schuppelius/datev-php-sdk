<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeVersionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\FeeVersions\FeeVersion;
use Datev\Entities\Law\FeeVersions\FeeVersions;

class FeeVersionTest extends EntityTest {
    public function testCreateFeeVersion(): void {
        $data = [
            "id" => 1,
            "name" => "RVG 2021"
        ];

        $feeVersion = new FeeVersion($data);

        $this->assertInstanceOf(FeeVersion::class, $feeVersion);
        $this->assertEquals(1, $feeVersion->getID());
        $this->assertEquals("RVG 2021", $feeVersion->getName());
    }

    public function testCreateFeeVersions(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "name" => "RVG 2021"
                ],
                [
                    "id" => 2,
                    "name" => "RVG 2024"
                ]
            ]
        ];

        $feeVersions = new FeeVersions($data);

        $this->assertInstanceOf(FeeVersions::class, $feeVersions);
        $this->assertCount(2, $feeVersions);
    }
}
