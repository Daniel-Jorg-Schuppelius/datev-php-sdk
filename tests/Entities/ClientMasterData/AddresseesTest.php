<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddresseesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Addressees\Addressees;
use Datev\Entities\ClientMasterData\Addressees\Addressee;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AddresseesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "addr-1",
                    "current_short_name" => "Mustermann GmbH",
                    "surrogate_name" => "Max Mustermann GmbH"
                ],
                [
                    "id" => "addr-2",
                    "current_short_name" => "Test AG",
                    "surrogate_name" => "Test AG"
                ]
            ]
        ];

        $addressees = new Addressees($data, $this->logger);

        $this->assertCount(2, $addressees->getValues());
        $this->assertInstanceOf(Addressee::class, $addressees->getValues()[0]);
    }
}
