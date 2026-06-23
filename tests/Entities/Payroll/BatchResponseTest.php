<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BatchResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\BatchResponse\BatchResponse;
use Datev\Entities\Payroll\BatchResponse\Failed\{FailedResponse, FailedResponses};
use Datev\Entities\Payroll\BatchResponse\Succeeded\{SucceededResponse, SucceededResponses};
use Tests\Contracts\EntityTest;

class BatchResponseTest extends EntityTest {
    public function test_create_batch_response(): void {
        $data = [
            "succeeded" => [
                [
                    "created_id" => "12345",
                ],
            ],
            "failed" => [
                [
                    "reason" => [
                        "error" => "REW11041",
                        "error_description" => "Validation failed",
                    ],
                ],
            ],
        ];

        $batchResponse = new BatchResponse($data);
        $this->assertInstanceOf(BatchResponse::class, $batchResponse);
    }

    public function test_create_succeeded_response(): void {
        $data = [
            "created_id" => "12345678",
        ];

        $succeededResponse = new SucceededResponse($data);
        $this->assertInstanceOf(SucceededResponse::class, $succeededResponse);
    }

    public function test_create_succeeded_responses(): void {
        $data = [
            [
                "created_id" => "12345678",
            ],
            [
                "created_id" => "87654321",
            ],
        ];

        $succeededResponses = new SucceededResponses($data);
        $this->assertInstanceOf(SucceededResponses::class, $succeededResponses);
        $this->assertCount(2, $succeededResponses->getValues());
    }

    public function test_create_failed_response(): void {
        $data = [
            "reason" => [
                "error" => "REW11041",
                "error_description" => "Validation failed",
            ],
        ];

        $failedResponse = new FailedResponse($data);
        $this->assertInstanceOf(FailedResponse::class, $failedResponse);
    }

    public function test_create_failed_responses(): void {
        $data = [
            [
                "reason" => [
                    "error" => "REW11041",
                    "error_description" => "Validation failed",
                ],
            ],
        ];

        $failedResponses = new FailedResponses($data);
        $this->assertInstanceOf(FailedResponses::class, $failedResponses);
        $this->assertCount(1, $failedResponses->getValues());
    }
}
