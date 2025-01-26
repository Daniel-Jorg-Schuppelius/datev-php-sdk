<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CompanyNameTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use DateTime;
use Datev\Entities\ClientMasterData\CompanyNames\CompanyName;
use Datev\Entities\ClientMasterData\CompanyNames\CompanyNames;
use PHPUnit\Framework\TestCase;

class CompanyNameTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCompanyName() {
        $data = [
            "valid_from" => "2024-09-30",
            "value" => "Mustermeier GmbH"
        ];

        $companyName = new CompanyName($data, $this->logger);
        $this->assertTrue($companyName->isValid());
        $this->assertInstanceOf(CompanyName::class, new CompanyName());
        $this->assertInstanceOf(CompanyName::class, $companyName);
        $this->assertEquals($data, $companyName->toArray(true, "Y-m-d"));
        $this->assertEquals(["current_company_name" => "Mustermeier GmbH"], $companyName->toArray());
        $this->assertEquals(new DateTime("2024-09-30"), $companyName->getValidFrom());
    }

    public function testCreateCompanyNames() {
        $data = [
            [
                "valid_from" => "2024-09-30",
                "value" => "Mustermeier GmbH"
            ],
            [
                "valid_from" => "2024-06-20",
                "value" => "Mustermax GmbH"
            ]
        ];
        $data1 = [
            [
                "valid_from" => "2024-09-30T00:00:00.000+00:00",
                "value" => "Mustermeier GmbH"
            ],
            [
                "valid_from" => "2024-06-20T00:00:00.000+00:00",
                "value" => "Mustermax GmbH"
            ]
        ];

        $companyNames = new CompanyNames($data, $this->logger);
        $this->assertInstanceOf(CompanyNames::class, $companyNames);
        $this->assertEquals($data, $companyNames->toArray(true, "Y-m-d"));
        $this->assertEquals($data1, $companyNames->toArray());
    }
}
