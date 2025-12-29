<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ErrorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\Errors\Errors;
use Datev\Entities\Common\Errors\Error;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ErrorsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "error" => "validation_failed",
                    "error_description" => "Validation failed for email field"
                ],
                [
                    "error" => "required_field",
                    "error_description" => "Required field name is missing"
                ]
            ]
        ];

        $errors = new Errors($data, $this->logger);

        $this->assertCount(2, $errors->getValues());
        $this->assertInstanceOf(Error::class, $errors->getValues()[0]);
    }
}
