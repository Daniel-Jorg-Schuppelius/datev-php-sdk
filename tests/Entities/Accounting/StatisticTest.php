<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StatisticTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\Statistics\{Statistic, Statistics};
use Tests\Contracts\EntityTest;

class StatisticTest extends EntityTest {
    public function test_create_statistic() {
        $data = [
            "id" => 1,
            "month" => 6,
            "count_of_accounting_journal" => 150,
            "count_of_accounting_prima_nota" => 75,
        ];

        $statistic = new Statistic($data);
        $this->assertInstanceOf(Statistic::class, $statistic);
        $this->assertNotNull($statistic->getID());
    }

    public function test_create_statistics() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "month" => 1,
                ],
                [
                    "id" => 2,
                    "month" => 2,
                ],
            ],
        ];

        $statistics = new Statistics($data);
        $this->assertInstanceOf(Statistics::class, $statistics);
        $this->assertCount(2, $statistics->getValues());
    }
}
