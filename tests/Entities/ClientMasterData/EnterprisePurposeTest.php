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

use Datev\Entities\ClientMasterData\EnterprisePurposes\{EnterprisePurpose, EnterprisePurposes};
use Tests\Contracts\EntityTest;

class EnterprisePurposeTest extends EntityTest {
    public function test_create_enterprise_purpose(): void {
        $data = [
            "value" => "Handel und Vertrieb",
            "valid_from" => "2024-01-01",
        ];

        $purpose = new EnterprisePurpose($data);
        $this->assertInstanceOf(EnterprisePurpose::class, $purpose);
    }

    public function test_create_enterprise_purposes(): void {
        $data = [
            [
                "value" => "Handel und Vertrieb",
                "valid_from" => "2024-01-01",
            ],
        ];

        $purposes = new EnterprisePurposes($data);
        $this->assertInstanceOf(EnterprisePurposes::class, $purposes);
    }
}
