<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupMemberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Groups\GroupMember;
use Datev\Entities\IdentityAndAccessManagement\Groups\GroupMembers;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class GroupMemberTest extends TestCase {
    public function testCreateGroupMember(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "value" => "user-12345",
            '$ref' => "https://api.datev.de/scim/v2/Users/user-12345"
        ];

        $member = new GroupMember($data, $logger);

        $this->assertInstanceOf(GroupMember::class, $member);
        $this->assertEquals("user-12345", $member->getValue());
        $this->assertEquals("https://api.datev.de/scim/v2/Users/user-12345", $member->getRef());
    }

    public function testCreateGroupMembers(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            [
                "value" => "user-001",
                '$ref' => "https://api.datev.de/scim/v2/Users/user-001"
            ],
            [
                "value" => "user-002",
                '$ref' => "https://api.datev.de/scim/v2/Users/user-002"
            ]
        ];

        $members = new GroupMembers($data, $logger);

        $this->assertInstanceOf(GroupMembers::class, $members);
        $this->assertCount(2, $members->getValues());
    }
}
