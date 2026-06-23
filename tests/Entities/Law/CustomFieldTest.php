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

use Datev\Entities\Law\CustomFields\{CustomField, CustomFields};
use Tests\Contracts\EntityTest;

class CustomFieldTest extends EntityTest {
    public function test_create_custom_field(): void {
        $data = [
            "id" => "test-id",
            "relation" => "file",
            "name" => "Priorität",
            "datatype" => "string",
            "length" => 50,
        ];

        $customField = new CustomField($data);

        $this->assertInstanceOf(CustomField::class, $customField);
        $this->assertEquals("file", $customField->getRelation());
        $this->assertEquals("Priorität", $customField->getName());
        $this->assertEquals("string", $customField->getDatatype());
    }

    public function test_create_custom_fields(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "name" => "Priorität",
                ],
                [
                    "id" => "test-id-2",
                    "name" => "Status",
                ],
            ],
        ];

        $customFields = new CustomFields($data);

        $this->assertInstanceOf(CustomFields::class, $customFields);
        $this->assertCount(2, $customFields);
    }
}
