<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimFilterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimFilter;
use Tests\Contracts\EntityTest;

class ScimFilterTest extends EntityTest {
    public function test_create_scim_filter(): void {
        $data = [
            "supported" => true,
            "max_results" => 500,
        ];

        $filter = new ScimFilter($data);

        $this->assertInstanceOf(ScimFilter::class, $filter);
        $this->assertTrue($filter->isSupported());
        $this->assertEquals(500, $filter->getMaxResults());
    }

    public function test_unsupported_scim_filter(): void {
        $data = [
            "supported" => false,
        ];

        $filter = new ScimFilter($data);

        $this->assertFalse($filter->isSupported());
    }
}
