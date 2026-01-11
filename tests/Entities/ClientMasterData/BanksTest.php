<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BanksTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Banks\Banks;
use Datev\Entities\ClientMasterData\Banks\Bank;

class BanksTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "bank-1",
                    "bic" => "COBADEFFXXX",
                    "country_code" => "DE"
                ],
                [
                    "id" => "bank-2",
                    "bic" => "DEUTDEFF",
                    "country_code" => "DE"
                ]
            ]
        ];

        $banks = new Banks($data);

        $this->assertCount(2, $banks->getValues());
        $this->assertInstanceOf(Bank::class, $banks->getValues()[0]);
    }
}
