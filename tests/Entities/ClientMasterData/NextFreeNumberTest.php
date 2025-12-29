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

use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumber;
use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumbers;
use PHPUnit\Framework\TestCase;

class NextFreeNumberTest extends TestCase {
    public function testCreateNextFreeNumber() {
        $data = [
            "value" => 1001
        ];

        $number = new NextFreeNumber($data);
        $this->assertInstanceOf(NextFreeNumber::class, $number);
    }

    public function testCreateNextFreeNumbers() {
        $data = [
            [
                "value" => 1001
            ]
        ];

        $numbers = new NextFreeNumbers($data);
        $this->assertInstanceOf(NextFreeNumbers::class, $numbers);
    }
}
