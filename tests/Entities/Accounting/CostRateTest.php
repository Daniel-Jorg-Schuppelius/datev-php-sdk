<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostRates\{CostRate, CostRates};
use Tests\Contracts\EntityTest;

class CostRateTest extends EntityTest {
    public function test_create_cost_rate(): void {
        $data = [
            "valid_from" => 202401,
            "valid_to" => 202412,
            "rate" => 125.50,
        ];

        $costRate = new CostRate($data);

        $this->assertInstanceOf(CostRate::class, $costRate);
    }

    public function test_create_cost_rates(): void {
        $data = [
            "content" => [
                [
                    "valid_from" => 202401,
                    "rate" => 125.50,
                ],
                [
                    "valid_from" => 202407,
                    "rate" => 130.00,
                ],
            ],
        ];

        $costRates = new CostRates($data);

        $this->assertInstanceOf(CostRates::class, $costRates);
        $this->assertCount(2, $costRates);
    }
}
