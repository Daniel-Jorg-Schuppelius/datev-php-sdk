<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalariesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Salaries\Salaries;
use Datev\Entities\Payroll\Salaries\Salary;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SalariesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "00001",
                    "personnel_number" => "00001",
                    "current_gross_payment" => 3500.00,
                    "net_income" => 2500.00,
                    "tax_class" => 1
                ],
                [
                    "id" => "00002",
                    "personnel_number" => "00002",
                    "current_gross_payment" => 4000.00,
                    "net_income" => 2800.00,
                    "tax_class" => 3
                ]
            ]
        ];

        $salaries = new Salaries($data, $this->logger);

        $this->assertCount(2, $salaries->getValues());
        $this->assertInstanceOf(Salary::class, $salaries->getValues()[0]);
    }
}
