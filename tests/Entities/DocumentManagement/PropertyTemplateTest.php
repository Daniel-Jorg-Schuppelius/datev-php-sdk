<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PropertyTemplateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplates;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplateID;

class PropertyTemplateTest extends EntityTest {
    public function testCreatePropertyTemplate(): void {
        $data = [
            "id" => "tpl-001",
            "name" => "Standardvorlage Rechnung",
            "supplement" => "Eingangsrechnungen"
        ];

        $propertyTemplate = new PropertyTemplate($data);

        $this->assertInstanceOf(PropertyTemplate::class, $propertyTemplate);
        $this->assertInstanceOf(PropertyTemplateID::class, $propertyTemplate->getID());
        $this->assertEquals("tpl-001", $propertyTemplate->getID()->getValue());
        $this->assertEquals("Standardvorlage Rechnung", $propertyTemplate->getName());
        $this->assertEquals("Eingangsrechnungen", $propertyTemplate->getSupplement());
    }

    public function testCreatePropertyTemplates(): void {
        $data = [
            "content" => [
                [
                    "id" => "tpl-001",
                    "name" => "Standardvorlage Rechnung"
                ],
                [
                    "id" => "tpl-002",
                    "name" => "Standardvorlage Beleg"
                ]
            ]
        ];

        $propertyTemplates = new PropertyTemplates($data);

        $this->assertInstanceOf(PropertyTemplates::class, $propertyTemplates);
        $this->assertCount(2, $propertyTemplates);
        $this->assertInstanceOf(PropertyTemplate::class, $propertyTemplates->getValues()[0]);
    }
}
