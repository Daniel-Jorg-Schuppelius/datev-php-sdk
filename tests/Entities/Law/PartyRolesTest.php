<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\PartyRoles\{PartyRole, PartyRoles};
use Tests\Contracts\EntityTest;

class PartyRolesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "pr-1", "name" => "Plaintiff", "short_name" => "PLF"],
                ["id" => "pr-2", "name" => "Defendant", "short_name" => "DEF"],
            ],
        ];
        $collection = new PartyRoles($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PartyRole::class, $collection->getValues()[0]);
    }
}
