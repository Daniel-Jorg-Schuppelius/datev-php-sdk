<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateOfNaturalPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfNaturalPerson;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class FederalStateOfNaturalPersonTest extends TestCase {
    public function testCreateFederalStateOfNaturalPerson(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "BY",
            "name" => "Bayern"
        ];

        $state = new FederalStateOfNaturalPerson($data, $logger);

        $this->assertInstanceOf(FederalStateOfNaturalPerson::class, $state);
    }
}
