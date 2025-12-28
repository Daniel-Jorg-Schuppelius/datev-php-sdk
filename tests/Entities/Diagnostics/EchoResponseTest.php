<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Diagnostics;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Diagnostics\EchoResponse\EchoResponse;
use PHPUnit\Framework\TestCase;

class EchoResponseTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateEchoResponse() {
        $data = [
            "id" => "echo-12345",
            "echo_message" => "Hello DATEV API!"
        ];

        $echoResponse = new EchoResponse($data, $this->logger);
        $this->assertInstanceOf(EchoResponse::class, $echoResponse);
        $this->assertEquals("Hello DATEV API!", $echoResponse->getEchoMessage());
        $this->assertNotNull($echoResponse->getID());
    }
}
