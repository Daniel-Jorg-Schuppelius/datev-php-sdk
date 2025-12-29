<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdvancePayments\AdvancePayments;
use Datev\Entities\Accounting\AdvancePayments\AdvancePayment;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AdvancePaymentsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["order_number" => "AZ-2024-001", "revenue_account" => 8400, "tax_key" => 7, "eu_member_state" => "DE"],
                ["order_number" => "AZ-2024-002", "revenue_account" => 8300, "tax_key" => 8, "eu_member_state" => "AT"]
            ]
        ];
        $collection = new AdvancePayments($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AdvancePayment::class, $collection->getValues()[0]);
    }
}
