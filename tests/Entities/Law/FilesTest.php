<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Files\LawFiles;
use Datev\Entities\Law\Files\LawFile;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FilesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "file-1", "file_name" => "Case File 1", "file_number" => "2024-001"],
                ["id" => "file-2", "file_name" => "Case File 2", "file_number" => "2024-002"]
            ]
        ];
        $collection = new LawFiles($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(LawFile::class, $collection->getValues()[0]);
    }
}
