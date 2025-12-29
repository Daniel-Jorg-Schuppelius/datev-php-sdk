<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualReferenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferenceID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class IndividualReferenceTest extends TestCase {
    public function testCreateIndividualReference(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "ref-001",
            "name" => "Projekt Alpha"
        ];

        $individualReference = new IndividualReference($data, $logger);

        $this->assertInstanceOf(IndividualReference::class, $individualReference);
        $this->assertInstanceOf(IndividualReferenceID::class, $individualReference->getID());
        $this->assertEquals("ref-001", $individualReference->getID()->getValue());
        $this->assertEquals("Projekt Alpha", $individualReference->getName());
    }

    public function testCreateIndividualReferences(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "ref-001",
                    "name" => "Projekt Alpha"
                ],
                [
                    "id" => "ref-002",
                    "name" => "Projekt Beta"
                ]
            ]
        ];

        $individualReferences = new IndividualReferences($data, $logger);

        $this->assertInstanceOf(IndividualReferences::class, $individualReferences);
        $this->assertCount(2, $individualReferences);
        $this->assertInstanceOf(IndividualReference::class, $individualReferences->getValues()[0]);
    }
}
