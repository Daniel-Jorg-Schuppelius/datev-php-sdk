<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NextFreeNumberTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\NextFreeNumbers\{NextFreeNumber, NextFreeNumbers};
use Tests\Contracts\EntityTest;

class NextFreeNumberTest extends EntityTest {
    public function test_create_next_free_number(): void {
        $data = [
            "value" => 1001,
        ];

        $number = new NextFreeNumber($data);
        $this->assertInstanceOf(NextFreeNumber::class, $number);
    }

    public function test_create_next_free_numbers(): void {
        $data = [
            [
                "value" => 1001,
            ],
        ];

        $numbers = new NextFreeNumbers($data);
        $this->assertInstanceOf(NextFreeNumbers::class, $numbers);
    }
}
