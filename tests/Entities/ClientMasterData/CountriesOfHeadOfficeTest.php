<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountriesOfHeadOfficeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\CountriesOfHeadOffice;
use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\CountryOfHeadOffice;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CountriesOfHeadOfficeTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_country_of_head_office" => "DE"],
                ["current_country_of_head_office" => "AT"]
            ]
        ];

        $countries = new CountriesOfHeadOffice($data, $this->logger);

        $this->assertCount(2, $countries->getValues());
        $this->assertInstanceOf(CountryOfHeadOffice::class, $countries->getValues()[0]);
    }
}
