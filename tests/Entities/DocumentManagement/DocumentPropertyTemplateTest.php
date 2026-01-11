<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentPropertyTemplateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Documents\PropertyTemplates\DocumentPropertyTemplate;

class DocumentPropertyTemplateTest extends EntityTest {
    public function testCreateDocumentPropertyTemplate(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Rechnungsvorlage",
            "supplement" => "Standard"
        ];

        $template = new DocumentPropertyTemplate($data);

        $this->assertInstanceOf(DocumentPropertyTemplate::class, $template);
        $this->assertEquals("Rechnungsvorlage", $template->getName());
        $this->assertEquals("Standard", $template->getSupplement());
    }
}
