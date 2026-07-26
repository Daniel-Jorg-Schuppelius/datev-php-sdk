<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenItemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\OpenItems\{OpenItem, OpenItems};
use Tests\Contracts\EntityTest;

class OpenItemTest extends EntityTest {
    public function test_create_open_item(): void {
        $data = [
            "assessment_year" => 2024,
            "assigned_due_date" => "2024-02-15T00:00:00.000+00:00",
            "due_date" => "2024-01-31T00:00:00.000+00:00",
            "has_dunning_block" => false,
            "has_interest_block" => false,
            "receivable_type_id" => "RT-001",
        ];

        $openItem = new OpenItem($data);
        $this->assertInstanceOf(OpenItem::class, new OpenItem);
        $this->assertInstanceOf(OpenItem::class, $openItem);
    }

    public function test_create_open_items(): void {
        $data = [
            "content" => [
                [
                    "assessment_year" => 2024,
                    "has_dunning_block" => false,
                ],
                [
                    "assessment_year" => 2023,
                    "has_dunning_block" => true,
                ],
            ],
        ];

        $openItems = new OpenItems($data);
        $this->assertInstanceOf(OpenItems::class, $openItems);
        $this->assertCount(2, $openItems->getValues());
    }
}
