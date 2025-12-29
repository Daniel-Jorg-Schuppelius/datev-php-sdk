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
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DocumentFileTest extends TestCase {
    public function testCreateDocumentFile(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "file-001"
        ];

        $documentFile = new DocumentFile($data, $logger);

        $this->assertInstanceOf(DocumentFile::class, $documentFile);
        $this->assertEquals("file-001", $documentFile->getID());
    }
}
