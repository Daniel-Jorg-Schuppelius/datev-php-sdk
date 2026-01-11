<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemUpdateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\StructureItems\Updates\StructureItemUpdate;

class StructureItemUpdateTest extends EntityTest {
    public function testCreateStructureItemUpdate(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Aktualisiertes Element",
            "creation_date" => "2024-01-15T10:30:00.000+00:00",
            "last_modification_date" => "2024-06-20T14:45:00.000+00:00",
            "revision_comment" => "Version 2.0"
        ];

        $update = new StructureItemUpdate($data);

        $this->assertInstanceOf(StructureItemUpdate::class, $update);
        $this->assertEquals("Aktualisiertes Element", $update->getName());
    }
}
