<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FailedResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponse;
use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponses;

class FailedResponseTest extends EntityTest {
    public function testCreateFailedResponse(): void {
        $data = [
            "index" => 0,
            "reason" => [
                "error" => "REW11041",
                "error_description" => "Validation failed"
            ]
        ];

        $response = new FailedResponse($data);

        $this->assertInstanceOf(FailedResponse::class, $response);
    }

    public function testCreateFailedResponses(): void {
        $data = [
            [
                "index" => 0,
                "reason" => [
                    "error" => "REW11041",
                    "error_description" => "Validation failed"
                ]
            ],
            [
                "index" => 1,
                "reason" => [
                    "error" => "REW11042",
                    "error_description" => "Field required"
                ]
            ]
        ];

        $responses = new FailedResponses($data);

        $this->assertInstanceOf(FailedResponses::class, $responses);
        $this->assertCount(2, $responses->getValues());
    }
}
