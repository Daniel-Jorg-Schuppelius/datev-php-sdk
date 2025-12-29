<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SucceededResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponse;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponses;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class SucceededResponseTest extends TestCase {
    public function testCreateSucceededResponse(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "index" => 0,
            "created_id" => "12345678"
        ];

        $response = new SucceededResponse($data, $logger);

        $this->assertInstanceOf(SucceededResponse::class, $response);
    }

    public function testCreateSucceededResponses(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            [
                "index" => 0,
                "created_id" => "12345678"
            ],
            [
                "index" => 1,
                "created_id" => "87654321"
            ]
        ];

        $responses = new SucceededResponses($data, $logger);

        $this->assertInstanceOf(SucceededResponses::class, $responses);
        $this->assertCount(2, $responses->getValues());
    }
}
