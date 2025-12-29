<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\Creditors\Creditors;
use Datev\Entities\Accounting\Creditors\Creditor;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CreditorsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "cred-1",
                    "caption" => "Lieferant A",
                    "account_number" => 70001
                ],
                [
                    "id" => "cred-2",
                    "caption" => "Lieferant B",
                    "account_number" => 70002
                ]
            ]
        ];

        $creditors = new Creditors($data, $this->logger);

        $this->assertCount(2, $creditors->getValues());
        $this->assertInstanceOf(Creditor::class, $creditors->getValues()[0]);
    }
}
