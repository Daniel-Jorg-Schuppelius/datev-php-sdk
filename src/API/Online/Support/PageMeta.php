<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PageMeta.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

use Psr\Http\Message\ResponseInterface;

/**
 * Header-basierte Seiteninformationen des Accounting Data Exchange:
 * x-current-page, x-page-size, x-total-count, x-total-pages.
 */
final class PageMeta {
    public readonly ?int $currentPage;

    public readonly ?int $pageSize;

    public readonly ?int $totalCount;

    public readonly ?int $totalPages;

    public function __construct(?int $currentPage = null, ?int $pageSize = null, ?int $totalCount = null, ?int $totalPages = null) {
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;
        $this->totalCount = $totalCount;
        $this->totalPages = $totalPages;
    }

    public static function fromResponse(ResponseInterface $response): self {
        return new self(
            self::intHeader($response, 'x-current-page'),
            self::intHeader($response, 'x-page-size'),
            self::intHeader($response, 'x-total-count'),
            self::intHeader($response, 'x-total-pages')
        );
    }

    public function hasAny(): bool {
        return $this->currentPage !== null || $this->pageSize !== null || $this->totalCount !== null || $this->totalPages !== null;
    }

    public function hasNextPage(): bool {
        if ($this->currentPage === null || $this->totalPages === null) {
            return false;
        }

        return $this->currentPage < $this->totalPages;
    }

    private static function intHeader(ResponseInterface $response, string $name): ?int {
        $value = $response->getHeaderLine($name);

        return is_numeric($value) ? (int) $value : null;
    }
}
