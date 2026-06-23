<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdditionalInformations\{AdditionalInformation, AdditionalInformations};
use Tests\Contracts\EntityTest;

class AdditionalInformationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["additional_information_type" => "20", "additional_information_content" => "Kostenstelle A"],
                ["additional_information_type" => "21", "additional_information_content" => "Projekt B"],
            ],
        ];
        $collection = new AdditionalInformations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AdditionalInformation::class, $collection->getValues()[0]);
    }
}
