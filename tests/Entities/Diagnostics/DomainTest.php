<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DomainTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Diagnostics;

use Datev\Entities\Diagnostics\Domains\{Domain, Domains};
use Tests\Contracts\EntityTest;

class DomainTest extends EntityTest {
    public function test_create_domain(): void {
        $data = [
            "Key" => "test-domain",
            "Value" => "Test Domain Value",
        ];

        $domain = new Domain($data);
        $this->assertInstanceOf(Domain::class, $domain);
        $this->assertEquals("test-domain", $domain->getKey());
        $this->assertEquals("Test Domain Value", $domain->getValue());
    }

    public function test_create_domains(): void {
        $data = [
            [
                "Key" => "test-domain-1",
                "Value" => "Test Domain Value 1",
            ],
            [
                "Key" => "test-domain-2",
                "Value" => "Test Domain Value 2",
            ],
        ];

        $domains = new Domains($data);
        $this->assertInstanceOf(Domains::class, $domains);
        $this->assertCount(2, $domains);
    }
}
