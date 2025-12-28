<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RequestIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\RequestID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class RequestIDTest extends TestCase {
    public function testCreateRequestID(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $requestID = new RequestID("req-123456789", $logger);

        $this->assertInstanceOf(RequestID::class, $requestID);
        $this->assertEquals("req-123456789", $requestID->getValue());
    }
}
