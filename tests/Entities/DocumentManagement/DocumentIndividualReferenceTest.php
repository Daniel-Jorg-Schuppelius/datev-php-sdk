<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentIndividualReferenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\IndividualReferences\DocumentIndividualReference;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DocumentIndividualReferenceTest extends TestCase {
    public function testCreateDocumentIndividualReference(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000"
        ];

        $reference = new DocumentIndividualReference($data, $logger);

        $this->assertInstanceOf(DocumentIndividualReference::class, $reference);
    }
}
