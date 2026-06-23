<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\Statistics\{Statistic, Statistics};
use Tests\Contracts\EntityTest;

class StatisticsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "1", "month" => 1, "count_of_accounting_journal" => 150, "count_of_accounting_prima_nota" => 75],
                ["id" => "2", "month" => 2, "count_of_accounting_journal" => 180, "count_of_accounting_prima_nota" => 90],
            ],
        ];
        $collection = new Statistics($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Statistic::class, $collection->getValues()[0]);
    }
}
