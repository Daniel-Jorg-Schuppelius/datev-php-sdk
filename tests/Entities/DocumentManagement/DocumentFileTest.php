<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentFileTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\DocumentFiles\DocumentFile;
use Tests\Contracts\EntityTest;

class DocumentFileTest extends EntityTest {
    public function test_create_document_file(): void {
        $data = [
            "id" => "file-001",
        ];

        $documentFile = new DocumentFile($data);

        $this->assertInstanceOf(DocumentFile::class, $documentFile);
        $this->assertEquals("file-001", $documentFile->getID());
    }
}
