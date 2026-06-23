<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ErrorTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\Errors\{Error, Errors};
use Datev\Entities\Common\RequestID;
use Tests\Contracts\EntityTest;

class ErrorTest extends EntityTest {
    public function test_create_error(): void {
        $data = [
            "request_id" => "req-001",
            "error" => "invalid_request",
            "error_description" => "Die Anfrage ist ungültig",
        ];

        $error = new Error($data);

        $this->assertInstanceOf(Error::class, $error);
        $this->assertInstanceOf(RequestID::class, $error->getID());
        $this->assertEquals("req-001", $error->getID()->getValue());
        $this->assertEquals("invalid_request", $error->getError());
        $this->assertEquals("Die Anfrage ist ungültig", $error->getErrorDescription());
    }

    public function test_create_errors(): void {
        $data = [
            "content" => [
                [
                    "request_id" => "req-001",
                    "error" => "invalid_request",
                    "error_description" => "Die Anfrage ist ungültig",
                ],
                [
                    "request_id" => "req-002",
                    "error" => "unauthorized",
                    "error_description" => "Nicht autorisiert",
                ],
            ],
        ];

        $errors = new Errors($data);

        $this->assertInstanceOf(Errors::class, $errors);
        $this->assertCount(2, $errors);
        $this->assertInstanceOf(Error::class, $errors->getValues()[0]);
    }
}
