<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\BatchResponse\Failed\Reason;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ReasonTest extends TestCase {
    public function testCreateReason(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "error" => "REW11041",
            "error_description" => "Validation failed for field XYZ",
            "request_id" => "req-12345"
        ];

        $reason = new Reason($data, $logger);

        $this->assertInstanceOf(Reason::class, $reason);
    }

    public function testCreateReasonWithAdditionalMessages(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "error" => "REW11042",
            "error_description" => "Multiple validation errors",
            "request_id" => "req-67890",
            "additional_messages" => [
                [
                    "description" => "Field A is required",
                    "severity" => "error"
                ],
                [
                    "description" => "Field B has invalid format",
                    "severity" => "warning"
                ]
            ]
        ];

        $reason = new Reason($data, $logger);

        $this->assertInstanceOf(Reason::class, $reason);
    }
}
