<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkHeaderParserTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online\Support;

use Datev\API\Online\Support\LinkHeaderParser;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class LinkHeaderParserTest extends TestCase {
    public function test_parses_datev_style_link_header(): void {
        // Format wie in der accounting-clients-Spezifikation dokumentiert
        $links = LinkHeaderParser::parse('<?skip=0&top=100>;rel="prev", <?skip=200&top=100>;rel="next"');

        $this->assertSame('?skip=0&top=100', $links['prev']);
        $this->assertSame('?skip=200&top=100', $links['next']);
    }

    public function test_parses_with_spaces_and_unquoted_rel(): void {
        $links = LinkHeaderParser::parse('<https://example.org/a> ; rel=next');

        $this->assertSame('https://example.org/a', $links['next']);
    }

    public function test_empty_header(): void {
        $this->assertSame([], LinkHeaderParser::parse(''));
        $this->assertSame([], LinkHeaderParser::fromResponse(new Response(200)));
    }

    public function test_from_response(): void {
        $response = new Response(200, ['Link' => '<clients?skip=100&top=100>; rel="next"']);

        $this->assertSame(['next' => 'clients?skip=100&top=100'], LinkHeaderParser::fromResponse($response));
    }
}
