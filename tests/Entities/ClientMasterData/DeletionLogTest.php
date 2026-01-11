<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DeletionLogTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLog;
use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLogs;

class DeletionLogTest extends EntityTest {
    public function testCreateDeletionLog() {
        $data = [
            "id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
            "timestamp" => "2024-01-15"
        ];

        $log = new DeletionLog($data);
        $this->assertInstanceOf(DeletionLog::class, $log);
        $this->assertNotNull($log->getID());
        $this->assertEquals("d13f9c3c-380c-494e-97c8-d12fff738189", $log->getID()->toString());
        $this->assertNotNull($log->getTimestamp());
    }

    public function testCreateDeletionLogs() {
        $data = [
            [
                "id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
                "timestamp" => "2024-01-15"
            ]
        ];

        $logs = new DeletionLogs($data);
        $this->assertInstanceOf(DeletionLogs::class, $logs);
        $this->assertCount(1, $logs);
    }
}
