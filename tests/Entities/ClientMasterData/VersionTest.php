<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\Versions\Version;
use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateBankAccount() {
        $data = [
            "adress_country" => "DE",
            "client_number_maximum_number_of_digits" => 5,
            "client_number_start" => 10000,
            "client_categories_groups_supported" => true,
            "db_build" => 930,
            "db_version" => "Pilotversion 9.2A",
            "db_version_date" => "31.08.2018",
            "id" => 1,
            "resource_revision" => "1.3.0",
            "resource_version" => "1",
            "version" => "9.2A",
            "version_name" => "Kernstammdaten - Daten V.9.2A"
        ];

        $data1 = [
            "adress_country" => "DE",
            "client_number_maximum_number_of_digits" => 5,
            "client_number_start" => 10000,
            "client_categories_groups_supported" => true,
            "db_build" => "930",
            "db_version" => "Pilotversion 9.2A",
            "db_version_date" => "2018-08-31T00:00:00.000+00:00",
            "id" => 1,
            "resource_revision" => "1.3.0",
            "resource_version" => "1",
            "version" => "9.2A",
            "version_name" => "Kernstammdaten - Daten V.9.2A"
        ];

        $version = new Version($data);
        $this->assertTrue($version->isValid());
        $version = new Version($data1, $this->logger);
        $this->assertInstanceOf(Version::class, new Version());
        $this->assertInstanceOf(Version::class, $version);
        $this->assertEquals($data1, $version->toArray());
    }
}
