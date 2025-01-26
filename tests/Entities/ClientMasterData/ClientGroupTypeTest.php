<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupType;
use PHPUnit\Framework\TestCase;

class ClientGroupTypeTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateClientGroupTypeTest() {
        $data = [
            "id" => "e93f9cab-380c-494e-47c8-d12fff738192",
            "name" => "Rechnungsgruppe A",
            "note" => "Bemerkung zu Rechnungsgruppe A",
            "short_name" => "RG A",
            "timestamp" => "2019-03-31T00:00:00.000+00:00"
        ];

        $clientGroupType = new ClientGroupType($data, $this->logger);
        $this->assertTrue($clientGroupType->isValid());
        $this->assertInstanceOf(ClientGroupType::class, new ClientGroupType());
        $this->assertInstanceOf(ClientGroupType::class, $clientGroupType);
        $this->assertEquals($data, $clientGroupType->toArray());
    }
}
