<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentLinkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Documents\DocumentLink;
use Tests\Contracts\EntityTest;

class DocumentLinkTest extends EntityTest {
    public function test_create_from_string(): void {
        $guid = "550e8400-e29b-41d4-a716-446655440000";
        $link = new DocumentLink($guid);

        $this->assertEquals($guid, $link->getValue());
    }
}
