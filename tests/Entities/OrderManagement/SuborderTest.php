<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SuborderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\OrderManagement\Suborders\Suborder;
use Datev\Entities\OrderManagement\Suborders\Suborders;
use PHPUnit\Framework\TestCase;

class SuborderTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateSuborder() {
        $data = [
            "suborder_id" => "s1234567-8901-2345-6789-012345678901",
            "order_id" => "o1234567-8901-2345-6789-012345678901",
            "suborder_number" => 1,
            "suborder_name" => "Teilauftrag 1",
            "planned_hours_time_units" => 40.0,
            "accounting_allowed" => true
        ];

        $suborder = new Suborder($data, $this->logger);
        $this->assertInstanceOf(Suborder::class, new Suborder());
        $this->assertInstanceOf(Suborder::class, $suborder);
    }

    public function testCreateSuborders() {
        $data = [
            "content" => [
                [
                    "suborder_id" => "s1234567-8901-2345-6789-012345678901",
                    "suborder_name" => "Teilauftrag 1"
                ],
                [
                    "suborder_id" => "s2234567-8901-2345-6789-012345678902",
                    "suborder_name" => "Teilauftrag 2"
                ]
            ]
        ];

        $suborders = new Suborders($data, $this->logger);
        $this->assertInstanceOf(Suborders::class, $suborders);
        $this->assertCount(2, $suborders->getValues());
    }
}
