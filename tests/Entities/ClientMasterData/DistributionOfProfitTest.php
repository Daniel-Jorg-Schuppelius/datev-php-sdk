<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DistributionOfProfitTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\DistributionsOfProfit\{DistributionOfProfit, DistributionsOfProfit};
use Tests\Contracts\EntityTest;

class DistributionOfProfitTest extends EntityTest {
    public function test_create_distribution_of_profit(): void {
        $data = [
            "percentage" => 50.0,
            "valid_from" => "2024-01-01",
        ];

        $distribution = new DistributionOfProfit($data);
        $this->assertInstanceOf(DistributionOfProfit::class, $distribution);
    }

    public function test_create_distributions_of_profit(): void {
        $data = [
            [
                "percentage" => 50.0,
                "valid_from" => "2024-01-01",
            ],
        ];

        $distributions = new DistributionsOfProfit($data);
        $this->assertInstanceOf(DistributionsOfProfit::class, $distributions);
    }
}
