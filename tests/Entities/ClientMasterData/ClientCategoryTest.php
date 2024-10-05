<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategory;
use PHPUnit\Framework\TestCase;

class ClientCategoryTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateClientCategory() {
        $data = [
            "id" => "76579af6-3272-4116-9ee1-d7e4a385256a",
            "client_category_type_id" => "c43f9c3d-380c-494e-47c8-d12fff738188",
            "client_category_type_short_name" => "VIP",
            "client_id" => "f23f9c3c-380c-494e-97c8-d12fff738189",
            "client_name" => "Mustermeier GmbH",
            "client_number" => 10000,
            "client_status" => "active",
            "timestamp" => "2020-03-31T00:00:00.000+00:00"
        ];

        $clientCategory = new ClientCategory($data, $this->logger);
        $this->assertTrue($clientCategory->isValid());
        $this->assertInstanceOf(ClientCategory::class, new ClientCategory());
        $this->assertInstanceOf(ClientCategory::class, $clientCategory);
        $this->assertEquals($data, $clientCategory->toArray());
    }
}
