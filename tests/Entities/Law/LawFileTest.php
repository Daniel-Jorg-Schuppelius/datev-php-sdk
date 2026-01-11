<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LawFileTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Files\LawFile;
use Datev\Entities\Law\Files\LawFiles;

class LawFileTest extends EntityTest {
    
    public function testCreateLawFile(): void {
        $data = [
            "id" => "test-id",
            "file_number_short" => "2024-001",
            "file_number" => "2024-001-ST",
            "file_name" => "Mustermann gegen Meyer",
            "short_name" => "Mustermann",
            "category" => "Zivilrecht",
            "project_number" => "P-001",
            "short_reason" => "Kaufvertrag",
            "long_reason" => "Streit über Kaufvertrag"
        ];

        $lawFile = new LawFile($data);

        $this->assertInstanceOf(LawFile::class, $lawFile);
        $this->assertEquals("2024-001", $lawFile->getFileNumberShort());
        $this->assertEquals("2024-001-ST", $lawFile->getFileNumber());
        $this->assertEquals("Mustermann gegen Meyer", $lawFile->getFileName());
        $this->assertEquals("Zivilrecht", $lawFile->getCategory());
    }

    public function testCreateLawFiles(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "file_number" => "2024-001",
                    "file_name" => "Mustermann"
                ],
                [
                    "id" => "test-id-2",
                    "file_number" => "2024-002",
                    "file_name" => "Meyer"
                ]
            ]
        ];

        $lawFiles = new LawFiles($data);

        $this->assertInstanceOf(LawFiles::class, $lawFiles);
        $this->assertCount(2, $lawFiles);
    }
}
