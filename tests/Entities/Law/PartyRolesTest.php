<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\PartyRoles\PartyRoles;
use Datev\Entities\Law\PartyRoles\PartyRole;

class PartyRolesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "pr-1", "name" => "Plaintiff", "short_name" => "PLF"],
                ["id" => "pr-2", "name" => "Defendant", "short_name" => "DEF"]
            ]
        ];
        $collection = new PartyRoles($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PartyRole::class, $collection->getValues()[0]);
    }
}
