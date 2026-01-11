<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DistributionsOfProfitTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionsOfProfit;
use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionOfProfit;

class DistributionsOfProfitTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_distribution_of_profit" => "50"],
                ["current_distribution_of_profit" => "50"]
            ]
        ];

        $distributions = new DistributionsOfProfit($data);

        $this->assertCount(2, $distributions->getValues());
        $this->assertInstanceOf(DistributionOfProfit::class, $distributions->getValues()[0]);
    }
}
