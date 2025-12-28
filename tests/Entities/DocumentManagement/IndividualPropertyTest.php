<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualPropertyTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperty;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualPropertyID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class IndividualPropertyTest extends TestCase {
    public function testCreateIndividualProperty(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "prop-001",
            "data_name" => "CustomField1",
            "data_type" => "string",
            "display_name" => "Benutzerdefiniertes Feld",
            "order" => 1,
            "active" => true,
            "reference_item" => false
        ];

        $individualProperty = new IndividualProperty($data, $logger);

        $this->assertInstanceOf(IndividualProperty::class, $individualProperty);
        $this->assertInstanceOf(IndividualPropertyID::class, $individualProperty->getID());
        $this->assertEquals("prop-001", $individualProperty->getID()->getValue());
        $this->assertEquals("CustomField1", $individualProperty->getDataName());
        $this->assertEquals("string", $individualProperty->getDataType());
        $this->assertEquals("Benutzerdefiniertes Feld", $individualProperty->getDisplayName());
        $this->assertEquals(1, $individualProperty->getOrder());
    }

    public function testCreateIndividualProperties(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "prop-001",
                    "data_name" => "CustomField1",
                    "display_name" => "Feld 1",
                    "active" => true
                ],
                [
                    "id" => "prop-002",
                    "data_name" => "CustomField2",
                    "display_name" => "Feld 2",
                    "active" => true
                ]
            ]
        ];

        $individualProperties = new IndividualProperties($data, $logger);

        $this->assertInstanceOf(IndividualProperties::class, $individualProperties);
        $this->assertCount(2, $individualProperties);
        $this->assertInstanceOf(IndividualProperty::class, $individualProperties->getValues()[0]);
    }
}
