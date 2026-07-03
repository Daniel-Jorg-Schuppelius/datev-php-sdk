<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PageMetaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online\Support;

use Datev\API\Online\Support\{PageMeta, PageResult};
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class PageMetaTest extends TestCase {
    public function test_from_response_with_headers(): void {
        $response = new Response(200, [
            'x-current-page' => '2',
            'x-page-size' => '100',
            'x-total-count' => '250',
            'x-total-pages' => '3',
        ]);

        $meta = PageMeta::fromResponse($response);

        $this->assertTrue($meta->hasAny());
        $this->assertSame(2, $meta->currentPage);
        $this->assertSame(100, $meta->pageSize);
        $this->assertSame(250, $meta->totalCount);
        $this->assertSame(3, $meta->totalPages);
        $this->assertTrue($meta->hasNextPage());
    }

    public function test_from_response_without_headers(): void {
        $meta = PageMeta::fromResponse(new Response(200));

        $this->assertFalse($meta->hasAny());
        $this->assertFalse($meta->hasNextPage());
    }

    public function test_last_page_has_no_next(): void {
        $meta = new PageMeta(3, 100, 250, 3);

        $this->assertFalse($meta->hasNextPage());
    }

    public function test_page_result_has_next_via_links(): void {
        $page = new PageResult(null, 10, ['next' => 'clients?skip=10'], null);

        $this->assertTrue($page->hasNext());
        $this->assertSame('clients?skip=10', $page->getNextLink());
        $this->assertTrue($page->isEmpty());
    }

    public function test_page_result_has_next_via_page_meta(): void {
        $page = new PageResult(null, null, [], new PageMeta(1, 100, 250, 3));

        $this->assertTrue($page->hasNext());
        $this->assertNull($page->getNextLink());
    }
}
