<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use DateTime;
use Datev\Entities\ClientMasterData\Addresses\Address;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;
use PHPUnit\Framework\TestCase;

class AreaOfResponsibilityTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAddress() {
        $data = [
            "id" => "NA",
            "name" => "Notariatsaufgaben",
            "description" => "Zuständigkeitsbereich wird nicht genutzt.",
            "standard" => true,
            "status" => "inactive"
        ];

        $areaOfResponsibility = new AreaOfResponsibility($data, $this->logger);
        $this->assertTrue($areaOfResponsibility->isValid());
        $this->assertInstanceOf(AreaOfResponsibility::class, new AreaOfResponsibility());
        $this->assertInstanceOf(AreaOfResponsibility::class, $areaOfResponsibility);
        $this->assertEquals($data, $areaOfResponsibility->toArray());
    }
}
