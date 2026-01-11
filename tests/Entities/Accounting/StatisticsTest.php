<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Statistics\Statistics;
use Datev\Entities\Accounting\Statistics\Statistic;

class StatisticsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "month" => 1, "count_of_accounting_journal" => 150, "count_of_accounting_prima_nota" => 75],
                ["id" => "2", "month" => 2, "count_of_accounting_journal" => 180, "count_of_accounting_prima_nota" => 90]
            ]
        ];
        $collection = new Statistics($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Statistic::class, $collection->getValues()[0]);
    }
}
