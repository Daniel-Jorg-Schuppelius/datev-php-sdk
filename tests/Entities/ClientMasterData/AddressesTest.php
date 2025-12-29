<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Addresses\Addresses;
use Datev\Entities\ClientMasterData\Addresses\Address;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AddressesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "addr-1",
                    "street" => "Hauptstraße 1",
                    "city" => "Stuttgart"
                ],
                [
                    "id" => "addr-2",
                    "street" => "Nebenweg 5",
                    "city" => "Hamburg"
                ]
            ]
        ];

        $addresses = new Addresses($data, $this->logger);

        $this->assertCount(2, $addresses->getValues());
        $this->assertInstanceOf(Address::class, $addresses->getValues()[0]);
    }
}
