<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Notes\Notes;
use Datev\Entities\DocumentManagement\Notes\Note;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class NotesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["text" => "First note", "popup" => true],
                ["text" => "Second note", "popup" => false]
            ]
        ];
        $collection = new Notes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Note::class, $collection->getValues()[0]);
    }
}
