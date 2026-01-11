<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLogs;
use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLog;

class DeletionLogsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "dl-1", "timestamp" => "2024-01-15T10:00:00Z"],
                ["id" => "dl-2", "timestamp" => "2024-01-16T10:00:00Z"]
            ]
        ];
        $collection = new DeletionLogs($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(DeletionLog::class, $collection->getValues()[0]);
    }
}
