<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BaseStructureItemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\StructureItems\BaseStructureItem;

class BaseStructureItemTest extends EntityTest {
    public function testCreateBaseStructureItem(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "creation_date" => "2024-01-15T10:30:00.000+00:00",
            "last_modification_date" => "2024-06-20T14:45:00.000+00:00",
            "revision_comment" => "Initial version"
        ];

        $item = new BaseStructureItem($data);

        $this->assertInstanceOf(BaseStructureItem::class, $item);
    }
}
