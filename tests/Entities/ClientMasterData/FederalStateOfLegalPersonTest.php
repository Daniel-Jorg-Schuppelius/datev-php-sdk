<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateOfLegalPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfLegalPerson;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class FederalStateOfLegalPersonTest extends TestCase {
    public function testCreateFederalStateOfLegalPerson(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "NW",
            "name" => "Nordrhein-Westfalen"
        ];

        $state = new FederalStateOfLegalPerson($data, $logger);

        $this->assertInstanceOf(FederalStateOfLegalPerson::class, $state);
    }
}
