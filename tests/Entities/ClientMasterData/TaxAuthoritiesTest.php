<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxAuthoritiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\TaxAuthorities\TaxAuthorities;
use Datev\Entities\ClientMasterData\TaxAuthorities\TaxAuthority;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TaxAuthoritiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "ta-1",
                    "name" => "Finanzamt München",
                    "number" => 9181
                ],
                [
                    "id" => "ta-2",
                    "name" => "Finanzamt Berlin",
                    "number" => 1175
                ]
            ]
        ];

        $taxAuthorities = new TaxAuthorities($data, $this->logger);

        $this->assertCount(2, $taxAuthorities->getValues());
        $this->assertInstanceOf(TaxAuthority::class, $taxAuthorities->getValues()[0]);
    }
}
