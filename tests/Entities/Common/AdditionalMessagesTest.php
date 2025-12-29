<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalMessagesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\AdditionalMessages\AdditionalMessages;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessage;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AdditionalMessagesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "msg-1",
                    "description" => "Processing completed",
                    "severity" => "info"
                ],
                [
                    "id" => "msg-2",
                    "description" => "Deprecated field used",
                    "severity" => "warning"
                ]
            ]
        ];

        $messages = new AdditionalMessages($data, $this->logger);

        $this->assertCount(2, $messages->getValues());
        $this->assertInstanceOf(AdditionalMessage::class, $messages->getValues()[0]);
    }
}
