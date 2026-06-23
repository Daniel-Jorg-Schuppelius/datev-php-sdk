<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VariousAddressesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\VariousAddresses\{VariousAddress, VariousAddresses};
use Tests\Contracts\EntityTest;

class VariousAddressesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "va-1",
                    "account_number" => 90001,
                    "caption" => "Sonstige Adresse 1",
                ],
                [
                    "id" => "va-2",
                    "account_number" => 90002,
                    "caption" => "Sonstige Adresse 2",
                ],
            ],
        ];

        $addresses = new VariousAddresses($data);

        $this->assertCount(2, $addresses->getValues());
        $this->assertInstanceOf(VariousAddress::class, $addresses->getValues()[0]);
    }
}
