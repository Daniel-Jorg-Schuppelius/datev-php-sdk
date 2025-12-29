<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LawFilesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Files\LawFiles;
use Datev\Entities\Law\Files\LawFile;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LawFilesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "file-1",
                    "file_number" => "2024/001",
                    "file_name" => "Mandant A vs. B"
                ],
                [
                    "id" => "file-2",
                    "file_number" => "2024/002",
                    "file_name" => "Beratung C"
                ]
            ]
        ];

        $files = new LawFiles($data, $this->logger);

        $this->assertCount(2, $files->getValues());
        $this->assertInstanceOf(LawFile::class, $files->getValues()[0]);
    }
}
