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

use Datev\Entities\Payroll\BatchResponse\Failed\{FailedResponse, FailedResponses};
use Tests\Contracts\EntityTest;

class FailedResponseTest extends EntityTest {
    public function test_create_failed_response(): void {
        $data = [
            "index" => 0,
            "reason" => [
                "error" => "REW11041",
                "error_description" => "Validation failed",
            ],
        ];

        $response = new FailedResponse($data);

        $this->assertInstanceOf(FailedResponse::class, $response);
    }

    public function test_create_failed_responses(): void {
        $data = [
            [
                "index" => 0,
                "reason" => [
                    "error" => "REW11041",
                    "error_description" => "Validation failed",
                ],
            ],
            [
                "index" => 1,
                "reason" => [
                    "error" => "REW11042",
                    "error_description" => "Field required",
                ],
            ],
        ];

        $responses = new FailedResponses($data);

        $this->assertInstanceOf(FailedResponses::class, $responses);
        $this->assertCount(2, $responses->getValues());
    }
}
