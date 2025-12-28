<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Taxations\Taxation;
use Datev\Entities\Payroll\Taxations\Taxations;
use Datev\Entities\Payroll\Taxations\TaxationID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class TaxationTest extends TestCase {
    public function testCreateTaxation(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "tax-001",
            "tax_identification_number" => "12345678901",
            "employment_type" => "Hauptbeschäftigung",
            "requested_annual_allowance" => 1000.00,
            "is_two_percent_flat_rate_taxation" => false
        ];

        $taxation = new Taxation($data, $logger);

        $this->assertInstanceOf(Taxation::class, $taxation);
        $this->assertInstanceOf(TaxationID::class, $taxation->getID());
        $this->assertEquals("tax-001", $taxation->getID()->getValue());
        $this->assertEquals("12345678901", $taxation->getTaxIdentificationNumber());
        $this->assertEquals("Hauptbeschäftigung", $taxation->getEmploymentType());
        $this->assertEquals(1000.00, $taxation->getRequestedAnnualAllowance());
        $this->assertFalse($taxation->getIsTwoPercentFlatRateTaxation());
    }

    public function testCreateTaxations(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "tax-001",
                    "tax_identification_number" => "12345678901",
                    "employment_type" => "Hauptbeschäftigung"
                ],
                [
                    "id" => "tax-002",
                    "tax_identification_number" => "98765432109",
                    "employment_type" => "Nebenbeschäftigung"
                ]
            ]
        ];

        $taxations = new Taxations($data, $logger);

        $this->assertInstanceOf(Taxations::class, $taxations);
        $this->assertCount(2, $taxations);
        $this->assertInstanceOf(Taxation::class, $taxations->getValues()[0]);
    }
}
