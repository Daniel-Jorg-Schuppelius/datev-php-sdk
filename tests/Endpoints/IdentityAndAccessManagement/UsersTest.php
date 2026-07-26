<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UsersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\IdentityAndAccessManagement;

use Datev\API\Desktop\Endpoints\IdentityAndAccessManagement\UsersEndpoint;
use Datev\Entities\IdentityAndAccessManagement\Users\{User, UserID, Users};
use Tests\Contracts\EndpointTest;

class UsersTest extends EndpointTest {
    protected UsersEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new UsersEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            "id" => "f66a81fb-2681-45ec-81b0-ce8346baac07",
            "meta" => [
                "resource_type" => "user",
                "location" => "/iam/v1/users/f66a81fb-2681-45ec-81b0-ce8346baac07",
            ],
            "schemas" => [
                "urn:ietf:params:scim:schemas:core:2.0:User",
                "urn:ietf:params:scim:schemas:extension:datev:2.0:user",
            ],
            "name" => [
                "given_name" => "Max",
                "family_name" => "Mustermann",
            ],
            "display_name" => "Mustermann, Max",
            "active" => true,
            "entitlements" => ["IamUser"],
            "urn:ietf:params:scim:schemas:extension:datev:2.0:user" => [
                "initials" => "mm",
            ],
        ];

        $user = new User($data);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals("Mustermann, Max", $user->getDisplayName());
        $name = $user->getName();
        $this->assertNotNull($name);
        $this->assertEquals("Max", $name->getGivenName());
        $this->assertEquals("Mustermann", $name->getFamilyName());
        $this->assertTrue($user->isActive());
        $datevExtension = $user->getDatevExtension();
        $this->assertNotNull($datevExtension);
        $this->assertEquals("mm", $datevExtension->getInitials());
    }

    public function test_get_users(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $users = $this->endpoint->search();
        $this->assertInstanceOf(Users::class, $users);
    }

    public function test_get_user(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $userId = new UserID("f66a81fb-2681-45ec-81b0-ce8346baac07");
        $user = $this->endpoint->get($userId);
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_get_me(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $user = $this->endpoint->me();
        $this->assertInstanceOf(User::class, $user);
    }
}
