<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DatevUserExtensionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\DatevUserExtension;

class DatevUserExtensionTest extends EntityTest {
    public function testCreateDatevUserExtension(): void {
        $data = [
            "valid_from" => "2024-01-01T00:00:00.000+00:00",
            "valid_to" => "2025-12-31T23:59:59.000+00:00",
            "initials" => "DJS",
            "linked_windows_identity" => [
                "value" => "DOMAIN\\user"
            ],
            "linked_nuko_identity" => [
                "value" => "nuko-user-123"
            ]
        ];

        $extension = new DatevUserExtension($data);

        $this->assertInstanceOf(DatevUserExtension::class, $extension);
        $this->assertEquals("DJS", $extension->getInitials());
        $this->assertNotNull($extension->getValidFrom());
        $this->assertNotNull($extension->getLinkedWindowsIdentity());
    }
}
