<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimSchemaAttributeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchemaAttribute;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchemaAttributes;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimSchemaAttributeTest extends TestCase {
    public function testCreateScimSchemaAttribute(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "name" => "userName",
            "type" => "string",
            "description" => "Unique identifier for the user",
            "required" => true,
            "case_exact" => false,
            "mutability" => "readWrite",
            "returned" => "default",
            "uniqueness" => "server"
        ];

        $attribute = new ScimSchemaAttribute($data, $logger);

        $this->assertInstanceOf(ScimSchemaAttribute::class, $attribute);
    }

    public function testCreateScimSchemaAttributes(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            [
                "name" => "userName",
                "type" => "string"
            ],
            [
                "name" => "displayName",
                "type" => "string"
            ]
        ];

        $attributes = new ScimSchemaAttributes($data, $logger);

        $this->assertInstanceOf(ScimSchemaAttributes::class, $attributes);
        $this->assertCount(2, $attributes->getValues());
    }
}
