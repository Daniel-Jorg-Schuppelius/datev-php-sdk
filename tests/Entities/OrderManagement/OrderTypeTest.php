<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\OrderTypes\OrderType;
use Datev\Entities\OrderManagement\OrderTypes\OrderTypes;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class OrderTypeTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateOrderType(): void {
        $data = [
            "id" => "test-id",
            "ordertype" => "FIBU",
            "ordertype_name" => "Finanzbuchhaltung",
            "ordertype_group" => 1,
            "ordertype_group_name" => "Buchhaltung"
        ];

        $orderType = new OrderType($data, $this->logger);

        $this->assertInstanceOf(OrderType::class, $orderType);
        $this->assertEquals("FIBU", $orderType->getOrderType());
        $this->assertEquals("Finanzbuchhaltung", $orderType->getOrderTypeName());
        $this->assertEquals(1, $orderType->getOrderTypeGroup());
        $this->assertEquals("Buchhaltung", $orderType->getOrderTypeGroupName());
    }

    public function testCreateOrderTypes(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "ordertype" => "FIBU",
                    "ordertype_name" => "Finanzbuchhaltung"
                ],
                [
                    "id" => "test-id-2",
                    "ordertype" => "LOHN",
                    "ordertype_name" => "Lohnbuchhaltung"
                ]
            ]
        ];

        $orderTypes = new OrderTypes($data, $this->logger);

        $this->assertInstanceOf(OrderTypes::class, $orderTypes);
        $this->assertCount(2, $orderTypes);
    }
}
