<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NamesOfRegisterCourtTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NamesOfRegisterCourt;
use Datev\Entities\ClientMasterData\NamesOfRegisterCourt\NameOfRegisterCourt;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class NamesOfRegisterCourtTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_name_of_register_court" => "Amtsgericht München"],
                ["current_name_of_register_court" => "Amtsgericht Hamburg"]
            ]
        ];

        $names = new NamesOfRegisterCourt($data, $this->logger);

        $this->assertCount(2, $names->getValues());
        $this->assertInstanceOf(NameOfRegisterCourt::class, $names->getValues()[0]);
    }
}
