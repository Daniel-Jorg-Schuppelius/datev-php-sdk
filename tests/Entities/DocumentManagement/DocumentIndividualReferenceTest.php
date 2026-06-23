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
use Tests\Contracts\EntityTest;

class DocumentIndividualReferenceTest extends EntityTest {
    public function test_create_document_individual_reference(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
        ];

        $reference = new DocumentIndividualReference($data);

        $this->assertInstanceOf(DocumentIndividualReference::class, $reference);
    }
}
