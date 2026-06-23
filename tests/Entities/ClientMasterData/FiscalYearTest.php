<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FiscalYears\{FiscalYear, FiscalYears};
use Tests\Contracts\EntityTest;

class FiscalYearTest extends EntityTest {
    public function test_create_fiscal_year() {
        $data = [
            "start_date" => "2024-01-01",
            "end_date" => "2024-12-31",
        ];

        $year = new FiscalYear($data);
        $this->assertInstanceOf(FiscalYear::class, $year);
    }

    public function test_create_fiscal_years() {
        $data = [
            [
                "start_date" => "2024-01-01",
                "end_date" => "2024-12-31",
            ],
        ];

        $years = new FiscalYears($data);
        $this->assertInstanceOf(FiscalYears::class, $years);
    }
}
