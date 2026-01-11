<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimNameTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\ScimName;

class ScimNameTest extends EntityTest {
    public function testCreateScimName(): void {
        $data = [
            "given_name" => "Max",
            "family_name" => "Mustermann",
            "honorific_prefix" => "Dr."
        ];

        $name = new ScimName($data);

        $this->assertInstanceOf(ScimName::class, $name);
        $this->assertEquals("Max", $name->getGivenName());
        $this->assertEquals("Mustermann", $name->getFamilyName());
        $this->assertEquals("Dr.", $name->getHonorificPrefix());
    }

    public function testCreateScimNameMinimal(): void {
        $data = [
            "given_name" => "Erika",
            "family_name" => "Musterfrau"
        ];

        $name = new ScimName($data);

        $this->assertInstanceOf(ScimName::class, $name);
        $this->assertEquals("Erika", $name->getGivenName());
        $this->assertEquals("Musterfrau", $name->getFamilyName());
        $this->assertNull($name->getHonorificPrefix());
    }
}
