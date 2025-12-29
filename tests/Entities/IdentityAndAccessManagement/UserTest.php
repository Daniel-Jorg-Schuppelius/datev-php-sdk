<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UserTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\IdentityAndAccessManagement\Users\User;
use Datev\Entities\IdentityAndAccessManagement\Users\Users;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateUser() {
        $data = [
            "id" => "u1234567-8901-2345-6789-012345678901",
            "display_name" => "Max Mustermann",
            "active" => true,
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:User"]
        ];

        $user = new User($data, $this->logger);
        $this->assertInstanceOf(User::class, new User());
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals("Max Mustermann", $user->getDisplayName());
        $this->assertTrue($user->isActive());
    }

    public function testCreateUsers() {
        $data = [
            "content" => [
                [
                    "id" => "u1234567-8901-2345-6789-012345678901",
                    "display_name" => "User 1"
                ],
                [
                    "id" => "u2234567-8901-2345-6789-012345678902",
                    "display_name" => "User 2"
                ]
            ]
        ];

        $users = new Users($data, $this->logger);
        $this->assertInstanceOf(Users::class, $users);
        $this->assertCount(2, $users->getValues());
    }
}
