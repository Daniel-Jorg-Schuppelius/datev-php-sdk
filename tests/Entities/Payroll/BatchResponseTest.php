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

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\BatchResponse\BatchResponse;
use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponse;
use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponses;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponse;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponses;

class BatchResponseTest extends EntityTest {
    public function testCreateBatchResponse(): void {
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

    public function testCreateSucceededResponse(): void {
        $data = [
            "created_id" => "12345678",
        ];

        $succeededResponse = new SucceededResponse($data);
        $this->assertInstanceOf(SucceededResponse::class, $succeededResponse);
    }

    public function testCreateSucceededResponses(): void {
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

    public function testCreateFailedResponse(): void {
        $data = [
            "reason" => [
                "error" => "REW11041",
                "error_description" => "Validation failed",
            ],
        ];

        $failedResponse = new FailedResponse($data);
        $this->assertInstanceOf(FailedResponse::class, $failedResponse);
    }

    public function testCreateFailedResponses(): void {
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
