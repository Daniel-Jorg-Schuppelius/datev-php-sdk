<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FolderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Folders\Folder;
use Datev\Entities\DocumentManagement\Folders\Folders;
use Datev\Entities\DocumentManagement\Folders\FolderID;

class FolderTest extends EntityTest {
    public function testCreateFolder(): void {
        $data = [
            "id" => "12345",
            "name" => "Steuerunterlagen"
        ];

        $folder = new Folder($data);

        $this->assertInstanceOf(Folder::class, $folder);
        $this->assertInstanceOf(FolderID::class, $folder->getID());
        $this->assertEquals("12345", $folder->getID()->getValue());
        $this->assertEquals("Steuerunterlagen", $folder->getName());
    }

    public function testCreateFolders(): void {
        $data = [
            "content" => [
                [
                    "id" => "12345",
                    "name" => "Steuerunterlagen"
                ],
                [
                    "id" => "67890",
                    "name" => "Jahresabschluss"
                ]
            ]
        ];

        $folders = new Folders($data);

        $this->assertInstanceOf(Folders::class, $folders);
        $this->assertCount(2, $folders);
        $this->assertInstanceOf(Folder::class, $folders->getValues()[0]);
    }
}
