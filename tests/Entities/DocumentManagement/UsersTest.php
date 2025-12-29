<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Users\Users;
use Datev\Entities\DocumentManagement\Users\User;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class UsersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "user-1", "name" => "Admin", "is_deleted" => false],
                ["id" => "user-2", "name" => "User", "is_deleted" => false]
            ]
        ];
        $collection = new Users($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(User::class, $collection->getValues()[0]);
    }
}
