<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\Fees\Fee;
use Datev\Entities\PublicSector\Fees\Fees;
use PHPUnit\Framework\TestCase;

class FeeTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFee() {
        $data = [
            "id" => 123,
            "fee_name" => "Wassergebühr",
            "type_name" => "water"
        ];

        $fee = new Fee($data, $this->logger);
        $this->assertInstanceOf(Fee::class, new Fee());
        $this->assertInstanceOf(Fee::class, $fee);
        $this->assertEquals(123, $fee->getID());
        $this->assertEquals("Wassergebühr", $fee->getFeeName());
    }

    public function testCreateFees() {
        $data = [
            "content" => [
                [
                    "id" => 1
                ],
                [
                    "id" => 2
                ]
            ]
        ];

        $fees = new Fees($data, $this->logger);
        $this->assertInstanceOf(Fees::class, $fees);
        $this->assertCount(2, $fees->getValues());
    }
}
