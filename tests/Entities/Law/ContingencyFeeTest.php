<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContingencyFeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Law\ContingencyFees\ContingencyFee;
use Datev\Entities\Law\ContingencyFees\ContingencyFees;
use PHPUnit\Framework\TestCase;

class ContingencyFeeTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateContingencyFee() {
        $data = [
            "id" => "9ed35edf-dd17-456c-857d-b895a6859cf0",
            "object_type" => "Contingency-Fee-By-File",
            "unit_rate" => 125.00,
            "note" => "Sondervereinbarung",
            "document_currency" => "EUR",
            "valid_from" => "2018-02-01",
            "expense_type_id" => "a8d0e39f-a217-4744-b3a9-e253c7ac60a1",
            "file_id" => "3fa85f64-5717-4562-b3fc-2c963f66afa6"
        ];

        $contingencyFee = new ContingencyFee($data, $this->logger);
        $this->assertInstanceOf(ContingencyFee::class, new ContingencyFee());
        $this->assertInstanceOf(ContingencyFee::class, $contingencyFee);
        $this->assertNotNull($contingencyFee->getID());
        $this->assertEquals("Contingency-Fee-By-File", $contingencyFee->getObjectType());
        $this->assertEquals(125.00, $contingencyFee->getUnitRate());
        $this->assertEquals("EUR", $contingencyFee->getDocumentCurrency());
        $this->assertEquals("Sondervereinbarung", $contingencyFee->getNote());
    }

    public function testCreateContingencyFees() {
        $data = [
            "content" => [
                [
                    "id" => "9ed35edf-dd17-456c-857d-b895a6859cf0",
                    "object_type" => "Contingency-Fee-By-File",
                    "unit_rate" => 125.00
                ],
                [
                    "id" => "f8fad058-bdba-4313-85e1-ff99f57da9e0",
                    "object_type" => "Contingency-Fee-By-Client",
                    "unit_rate" => 150.00
                ]
            ]
        ];

        $contingencyFees = new ContingencyFees($data, $this->logger);
        $this->assertInstanceOf(ContingencyFees::class, $contingencyFees);
        $this->assertCount(2, $contingencyFees->getValues());
    }
}
