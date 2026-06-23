<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\{Document, Documents};
use Tests\Contracts\EntityTest;

class DocumentsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "doc-1",
                    "description" => "Rechnung 2024-001",
                    "extension" => ".pdf",
                ],
                [
                    "id" => "doc-2",
                    "description" => "Vertrag XY",
                    "extension" => ".pdf",
                ],
            ],
        ];

        $documents = new Documents($data);

        $this->assertCount(2, $documents->getValues());
        $this->assertInstanceOf(Document::class, $documents->getValues()[0]);
    }
}
