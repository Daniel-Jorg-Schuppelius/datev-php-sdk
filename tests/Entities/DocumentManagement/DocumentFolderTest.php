<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentFolderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\Folders\DocumentFolder;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DocumentFolderTest extends TestCase {
    public function testCreateDocumentFolder(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Eingangsrechnungen 2024"
        ];

        $folder = new DocumentFolder($data, $logger);

        $this->assertInstanceOf(DocumentFolder::class, $folder);
        $this->assertEquals("Eingangsrechnungen 2024", $folder->getName());
    }
}
