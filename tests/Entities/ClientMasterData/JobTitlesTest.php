<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\JobTitles\JobTitles;
use Datev\Entities\ClientMasterData\JobTitles\JobTitle;

class JobTitlesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "jt-1", "title" => "Manager"],
                ["id" => "jt-2", "title" => "Director"]
            ]
        ];
        $collection = new JobTitles($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(JobTitle::class, $collection->getValues()[0]);
    }
}
