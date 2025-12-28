<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsiderationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Considerations\Consideration;
use Datev\Entities\ClientMasterData\Considerations\Considerations;
use PHPUnit\Framework\TestCase;

class ConsiderationTest extends TestCase {
    public function testCreateConsideration() {
        $data = [
            "value" => "2024-01-15",
            "valid_from" => "2024-01-01"
        ];

        $consideration = new Consideration($data);
        $this->assertInstanceOf(Consideration::class, $consideration);
    }

    public function testCreateConsiderations() {
        $data = [
            [
                "value" => "2024-01-15",
                "valid_from" => "2024-01-01"
            ]
        ];

        $considerations = new Considerations($data);
        $this->assertInstanceOf(Considerations::class, $considerations);
    }
}
