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

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\VariousAddresses\VariousAddresses;
use Datev\Entities\Accounting\VariousAddresses\VariousAddress;

class VariousAddressesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "va-1",
                    "account_number" => 90001,
                    "caption" => "Sonstige Adresse 1"
                ],
                [
                    "id" => "va-2",
                    "account_number" => 90002,
                    "caption" => "Sonstige Adresse 2"
                ]
            ]
        ];

        $addresses = new VariousAddresses($data);

        $this->assertCount(2, $addresses->getValues());
        $this->assertInstanceOf(VariousAddress::class, $addresses->getValues()[0]);
    }
}
