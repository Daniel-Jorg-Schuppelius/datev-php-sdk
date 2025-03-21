<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalMessageTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use ERRORToolkit\Logger\ConsoleLogger;;

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
