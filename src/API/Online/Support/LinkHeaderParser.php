<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkHeaderParser.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

use Psr\Http\Message\ResponseInterface;

/**
 * Parst RFC-5988-Link-Header, wie sie accounting-clients und
 * accounting:extf-files zur Paginierung liefern:
 * <url1>; rel="next", <url2>; rel="last"
 */
final class LinkHeaderParser {
    /**
     * @return array<string, string> rel => URL
     */
    public static function parse(string $header): array {
        $links = [];

        if (trim($header) === '') {
            return $links;
        }

        foreach (explode(',', $header) as $part) {
            if (!preg_match('/<([^>]+)>\s*;\s*rel="?([^";]+)"?/', trim($part), $matches)) {
                continue;
            }
            $links[$matches[2]] = $matches[1];
        }

        return $links;
    }

    /**
     * @return array<string, string> rel => URL
     */
    public static function fromResponse(ResponseInterface $response): array {
        return self::parse($response->getHeaderLine('Link'));
    }
}
