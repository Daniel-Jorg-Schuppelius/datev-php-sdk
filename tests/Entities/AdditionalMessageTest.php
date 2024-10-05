<?php

declare(strict_types=1);

namespace Tests\Entities;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessage;
use PHPUnit\Framework\TestCase;

class AdditionalMessageTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAdditionalMessage() {
        $data = [
            "id" => "abc",
            "description" => "abc",
            "help_uri" => "abc",
            "severity" => "error"
        ];

        $additionalMessage = new AdditionalMessage($data);
        $this->assertTrue($additionalMessage->isValid());
        $additionalMessage = new AdditionalMessage($data, $this->logger);
        $this->assertInstanceOf(AdditionalMessage::class, new AdditionalMessage());
        $this->assertInstanceOf(AdditionalMessage::class, $additionalMessage);
        $this->assertEquals($data, $additionalMessage->toArray());
    }
}
