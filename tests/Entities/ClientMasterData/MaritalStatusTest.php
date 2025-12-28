<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MaritalStatusTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatus;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatuses;
use PHPUnit\Framework\TestCase;

class MaritalStatusTest extends TestCase {
    public function testCreateMaritalStatus() {
        $data = [
            "value" => "verheiratet",
            "valid_from" => "2024-01-01"
        ];

        $status = new MaritalStatus($data);
        $this->assertInstanceOf(MaritalStatus::class, $status);
    }

    public function testCreateMaritalStatuses() {
        $data = [
            [
                "value" => "verheiratet",
                "valid_from" => "2024-01-01"
            ]
        ];

        $statuses = new MaritalStatuses($data);
        $this->assertInstanceOf(MaritalStatuses::class, $statuses);
    }
}
