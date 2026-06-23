<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentClassTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\Classes\{DocumentClass, DocumentClassID};
use Tests\Contracts\EntityTest;

class DocumentClassTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "id" => 1,
            "name" => "Invoice",
        ];

        $documentClass = new DocumentClass($data);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(1, $documentClass->getID()->getValue());
        $this->assertEquals("Invoice", $documentClass->getName());
    }

    public function test_create_from_integer(): void {
        $documentClass = new DocumentClass(42);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(42, $documentClass->getID()->getValue());
        $this->assertNull($documentClass->getName());
    }

    public function test_create_with_null_name(): void {
        $data = [
            "id" => 2,
        ];

        $documentClass = new DocumentClass($data);

        $this->assertInstanceOf(DocumentClassID::class, $documentClass->getID());
        $this->assertEquals(2, $documentClass->getID()->getValue());
        $this->assertNull($documentClass->getName());
    }
}
