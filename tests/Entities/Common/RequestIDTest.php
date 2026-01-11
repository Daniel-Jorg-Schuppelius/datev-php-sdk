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

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\RequestID;

class RequestIDTest extends EntityTest {
    public function testCreateRequestID(): void {
        $requestID = new RequestID("req-123456789");

        $this->assertInstanceOf(RequestID::class, $requestID);
        $this->assertEquals("req-123456789", $requestID->getValue());
    }
}
