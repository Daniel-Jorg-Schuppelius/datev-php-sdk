<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentStateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Documents\States\DocumentState;

class DocumentStateTest extends EntityTest {
    public function testCreateDocumentState(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Gebucht"
        ];

        $state = new DocumentState($data);

        $this->assertInstanceOf(DocumentState::class, $state);
        $this->assertEquals("Gebucht", $state->getName());
    }
}
