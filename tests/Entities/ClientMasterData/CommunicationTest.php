<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\Communications\Communication;
use PHPUnit\Framework\TestCase;

class CommunicationTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCommunication() {
        $data = [
            "id" => "20b9d6d9-117b-4555-b0b0-3659eb0279d9",
            "type" => "phone",
            "data_content" => "+49 8721 123456",
            "number_standardized" => "00498721123456",
            "note" => "ab 9 Uhr",
            "is_main_communication" => true,
            "is_management_phone" => true
        ];

        $communication = new Communication($data, $this->logger);
        $this->assertTrue($communication->isValid());
        $this->assertInstanceOf(Communication::class, new Communication());
        $this->assertInstanceOf(Communication::class, $communication);
        $this->assertEquals($data, $communication->toArray());
    }
}
