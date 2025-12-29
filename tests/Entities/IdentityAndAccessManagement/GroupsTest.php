<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Groups\Groups;
use Datev\Entities\IdentityAndAccessManagement\Groups\Group;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class GroupsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "grp-1",
                    "display_name" => "Administrators"
                ],
                [
                    "id" => "grp-2",
                    "display_name" => "Users"
                ]
            ]
        ];

        $groups = new Groups($data, $this->logger);

        $this->assertCount(2, $groups->getValues());
        $this->assertInstanceOf(Group::class, $groups->getValues()[0]);
    }
}
