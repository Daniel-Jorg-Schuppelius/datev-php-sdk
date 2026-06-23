<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DomainsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Domains\{Domain, Domains};
use Tests\Contracts\EntityTest;

class DomainsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "dom-1",
                    "name" => "Rechnungen",
                ],
                [
                    "id" => "dom-2",
                    "name" => "Verträge",
                ],
            ],
        ];

        $domains = new Domains($data);

        $this->assertCount(2, $domains->getValues());
        $this->assertInstanceOf(Domain::class, $domains->getValues()[0]);
    }
}
