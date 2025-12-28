<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CitizenTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\Citizens\Citizen;
use Datev\Entities\PublicSector\Citizens\Citizens;
use PHPUnit\Framework\TestCase;

class CitizenTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCitizen() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "first_name" => "Max",
            "last_name" => "Mustermann"
        ];

        $citizen = new Citizen($data, $this->logger);
        $this->assertInstanceOf(Citizen::class, new Citizen());
        $this->assertInstanceOf(Citizen::class, $citizen);
    }

    public function testCreateCitizens() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "first_name" => "Max"
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "first_name" => "Erika"
                ]
            ]
        ];

        $citizens = new Citizens($data, $this->logger);
        $this->assertInstanceOf(Citizens::class, $citizens);
        $this->assertCount(2, $citizens->getValues());
    }
}
