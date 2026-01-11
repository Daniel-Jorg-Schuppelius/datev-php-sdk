<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DiagnosticsDomainsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Diagnostics;

use Tests\Contracts\EntityTest;

use Datev\Entities\Diagnostics\Domains\Domains;
use Datev\Entities\Diagnostics\Domains\Domain;

class DiagnosticsDomainsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "Key" => "accounting",
                    "Value" => "Accounting Domain"
                ],
                [
                    "Key" => "payroll",
                    "Value" => "Payroll Domain"
                ]
            ]
        ];

        $domains = new Domains($data);

        $this->assertCount(2, $domains->getValues());
        $this->assertInstanceOf(Domain::class, $domains->getValues()[0]);
    }
}
