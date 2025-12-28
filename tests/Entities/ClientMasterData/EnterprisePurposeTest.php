<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EnterprisePurposeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurpose;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurposes;
use PHPUnit\Framework\TestCase;

class EnterprisePurposeTest extends TestCase {
    public function testCreateEnterprisePurpose() {
        $data = [
            "value" => "Handel und Vertrieb",
            "valid_from" => "2024-01-01"
        ];

        $purpose = new EnterprisePurpose($data);
        $this->assertInstanceOf(EnterprisePurpose::class, $purpose);
    }

    public function testCreateEnterprisePurposes() {
        $data = [
            [
                "value" => "Handel und Vertrieb",
                "valid_from" => "2024-01-01"
            ]
        ];

        $purposes = new EnterprisePurposes($data);
        $this->assertInstanceOf(EnterprisePurposes::class, $purposes);
    }
}
