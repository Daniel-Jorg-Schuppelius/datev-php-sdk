<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentClassTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClass;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClassID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DocumentClassTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "id" => 1,
            "name" => "Invoice"
        ];

        $documentClass = new DocumentClass($data, $this->logger);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(1, $documentClass->getID()->getValue());
        $this->assertEquals("Invoice", $documentClass->getName());
    }

    public function testCreateFromInteger(): void {
        $documentClass = new DocumentClass(42, $this->logger);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(42, $documentClass->getID()->getValue());
        $this->assertNull($documentClass->getName());
    }

    public function testCreateWithNullName(): void {
        $data = [
            "id" => 2
        ];

        $documentClass = new DocumentClass($data, $this->logger);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(2, $documentClass->getID()->getValue());
        $this->assertNull($documentClass->getName());
    }
}
