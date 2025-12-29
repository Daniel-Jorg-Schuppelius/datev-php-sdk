<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\FiscalYears\FiscalYears;
use Datev\Entities\Accounting\FiscalYears\FiscalYear;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FiscalYearsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "fy-2023",
                    "begin" => "2023-01-01",
                    "end" => "2023-12-31"
                ],
                [
                    "id" => "fy-2024",
                    "begin" => "2024-01-01",
                    "end" => "2024-12-31"
                ]
            ]
        ];

        $fiscalYears = new FiscalYears($data, $this->logger);

        $this->assertCount(2, $fiscalYears->getValues());
        $this->assertInstanceOf(FiscalYear::class, $fiscalYears->getValues()[0]);
    }
}
