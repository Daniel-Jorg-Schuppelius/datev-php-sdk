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

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionOfProfit;
use Datev\Entities\ClientMasterData\DistributionsOfProfit\DistributionsOfProfit;

class DistributionOfProfitTest extends EntityTest {
    public function testCreateDistributionOfProfit() {
        $data = [
            "percentage" => 50.0,
            "valid_from" => "2024-01-01"
        ];

        $distribution = new DistributionOfProfit($data);
        $this->assertInstanceOf(DistributionOfProfit::class, $distribution);
    }

    public function testCreateDistributionsOfProfit() {
        $data = [
            [
                "percentage" => 50.0,
                "valid_from" => "2024-01-01"
            ]
        ];

        $distributions = new DistributionsOfProfit($data);
        $this->assertInstanceOf(DistributionsOfProfit::class, $distributions);
    }
}
