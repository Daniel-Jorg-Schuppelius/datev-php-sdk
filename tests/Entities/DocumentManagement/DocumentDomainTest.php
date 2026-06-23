<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentDomainTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\Domains\DocumentDomain;
use Tests\Contracts\EntityTest;

class DocumentDomainTest extends EntityTest {
    public function test_create_document_domain(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Rechnungen",
        ];

        $domain = new DocumentDomain($data);

        $this->assertInstanceOf(DocumentDomain::class, $domain);
        $this->assertEquals("Rechnungen", $domain->getName());
    }
}
