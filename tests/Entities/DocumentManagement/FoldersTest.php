<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FoldersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Folders\Folders;
use Datev\Entities\DocumentManagement\Folders\Folder;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FoldersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "folder-1",
                    "name" => "2024"
                ],
                [
                    "id" => "folder-2",
                    "name" => "2023"
                ]
            ]
        ];

        $folders = new Folders($data, $this->logger);

        $this->assertCount(2, $folders->getValues());
        $this->assertInstanceOf(Folder::class, $folders->getValues()[0]);
    }
}
