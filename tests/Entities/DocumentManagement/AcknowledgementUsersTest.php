<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\AcknowledgementUsers\{AcknowledgementUser, AcknowledgementUsers};
use Tests\Contracts\EntityTest;

class AcknowledgementUsersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "au-1", "name" => "Max Mustermann", "acknowledged" => "2024-01-15T10:30:00.000+00:00"],
                ["id" => "au-2", "name" => "Anna Schmidt", "is_deleted" => false],
            ],
        ];
        $collection = new AcknowledgementUsers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AcknowledgementUser::class, $collection->getValues()[0]);
    }
}
