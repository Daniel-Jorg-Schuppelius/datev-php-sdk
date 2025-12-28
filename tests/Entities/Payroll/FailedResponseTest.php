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

use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponse;
use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponses;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class FailedResponseTest extends TestCase {
    public function testCreateFailedResponse(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "index" => 0,
            "reason" => [
                "error" => "REW11041",
                "error_description" => "Validation failed"
            ]
        ];

        $response = new FailedResponse($data, $logger);

        $this->assertInstanceOf(FailedResponse::class, $response);
    }

    public function testCreateFailedResponses(): void {
        $logger = ConsoleLoggerFactory::getLogger();

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

        $responses = new FailedResponses($data, $logger);

        $this->assertInstanceOf(FailedResponses::class, $responses);
        $this->assertCount(2, $responses->getValues());
    }
}
