<?php
/*
 * Created on   : Thu Nov 12 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Online\HrExchange;

use Datev\Entities\Online\HrExchange\Jobs\Resource;
use Tests\Contracts\EntityTest;

/**
 * sub_resource verweist auf Resource selbst; ein leeres Objekt lief in initialize()
 * endlos (PHP 8.2: Segmentation Fault).
 */
class ResourceTest extends EntityTest {
    public function test_empty_resource_can_be_created(): void {
        $resource = new Resource;

        $this->assertNull($resource->getSubResource());
    }

    public function test_nested_sub_resource_is_read(): void {
        $resource = Resource::fromJson('{"id":"r-1","resource_name":"employees","sub_resource":{"id":"r-2","resource_name":"gross-payments"}}');

        $this->assertSame('r-2', $resource->getSubResource()?->getId());
        $this->assertNull($resource->getSubResource()->getSubResource());
    }
}
