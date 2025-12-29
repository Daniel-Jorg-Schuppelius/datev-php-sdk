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
use Datev\Entities\IdentityAndAccessManagement\Users\User;
use Datev\Entities\IdentityAndAccessManagement\Users\Users;
use Datev\Entities\IdentityAndAccessManagement\Users\UserID;
use Tests\Contracts\EndpointTest;

class UsersTest extends EndpointTest {
    protected ?UsersEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new UsersEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "id" => "f66a81fb-2681-45ec-81b0-ce8346baac07",
            "meta" => [
                "resource_type" => "user",
                "location" => "/iam/v1/users/f66a81fb-2681-45ec-81b0-ce8346baac07"
            ],
            "schemas" => [
                "urn:ietf:params:scim:schemas:core:2.0:User",
                "urn:ietf:params:scim:schemas:extension:datev:2.0:user"
            ],
            "name" => [
                "given_name" => "Max",
                "family_name" => "Mustermann"
            ],
            "display_name" => "Mustermann, Max",
            "active" => true,
            "entitlements" => ["IamUser"],
            "urn:ietf:params:scim:schemas:extension:datev:2.0:user" => [
                "initials" => "mm"
            ]
        ];

        $user = new User($data);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals("Mustermann, Max", $user->getDisplayName());
        $this->assertEquals("Max", $user->getName()->getGivenName());
        $this->assertEquals("Mustermann", $user->getName()->getFamilyName());
        $this->assertTrue($user->isActive());
        $this->assertEquals("mm", $user->getDatevExtension()->getInitials());
    }

    public function testGetUsers() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $users = $this->endpoint->search();
        $this->assertInstanceOf(Users::class, $users);
    }

    public function testGetUser() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $userId = new UserID("f66a81fb-2681-45ec-81b0-ce8346baac07");
        $user = $this->endpoint->get($userId);
        $this->assertInstanceOf(User::class, $user);
    }

    public function testGetMe() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $user = $this->endpoint->me();
        $this->assertInstanceOf(User::class, $user);
    }
}
