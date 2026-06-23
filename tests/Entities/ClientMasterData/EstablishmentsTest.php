<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Establishments\{Establishment, Establishments};
use Tests\Contracts\EntityTest;

class EstablishmentsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "est-1", "name" => "Hauptsitz", "short_name" => "HS"],
                ["id" => "est-2", "name" => "Niederlassung", "short_name" => "NL"],
            ],
        ];
        $collection = new Establishments($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Establishment::class, $collection->getValues()[0]);
    }
}
