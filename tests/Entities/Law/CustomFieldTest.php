<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CustomFieldTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\CustomFields\CustomField;
use Datev\Entities\Law\CustomFields\CustomFields;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CustomFieldTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCustomField(): void {
        $data = [
            "id" => "test-id",
            "relation" => "file",
            "name" => "Priorität",
            "datatype" => "string",
            "length" => 50
        ];

        $customField = new CustomField($data, $this->logger);

        $this->assertInstanceOf(CustomField::class, $customField);
        $this->assertEquals("file", $customField->getRelation());
        $this->assertEquals("Priorität", $customField->getName());
        $this->assertEquals("string", $customField->getDatatype());
    }

    public function testCreateCustomFields(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "name" => "Priorität"
                ],
                [
                    "id" => "test-id-2",
                    "name" => "Status"
                ]
            ]
        ];

        $customFields = new CustomFields($data, $this->logger);

        $this->assertInstanceOf(CustomFields::class, $customFields);
        $this->assertCount(2, $customFields);
    }
}
