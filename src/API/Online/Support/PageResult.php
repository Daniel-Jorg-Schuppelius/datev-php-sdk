<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PageResult.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

use APIToolkit\Contracts\Abstracts\NamedValues;

/**
 * Ergebnisseite eines paginierenden List-Endpoints: die Collection selbst
 * plus Paging-Metadaten aus den Response-Headern (Link/Total-Items bzw.
 * x-*-page*-Header).
 *
 * @template T of \APIToolkit\Contracts\Interfaces\NamedEntityInterface
 */
final class PageResult {
    /** @var ?NamedValues<T> */
    private ?NamedValues $items;

    private ?int $totalItems;

    /** @var array<string, string> rel => URL */
    private array $links;

    private ?PageMeta $pageMeta;

    /**
     * @param ?NamedValues<T> $items
     * @param array<string, string> $links rel => URL (aus dem Link-Header)
     */
    public function __construct(?NamedValues $items, ?int $totalItems = null, array $links = [], ?PageMeta $pageMeta = null) {
        $this->items = $items;
        $this->totalItems = $totalItems;
        $this->links = $links;
        $this->pageMeta = $pageMeta;
    }

    /**
     * @return ?NamedValues<T>
     */
    public function getItems(): ?NamedValues {
        return $this->items;
    }

    public function getTotalItems(): ?int {
        return $this->totalItems;
    }

    /**
     * @return array<string, string> rel => URL
     */
    public function getLinks(): array {
        return $this->links;
    }

    public function getPageMeta(): ?PageMeta {
        return $this->pageMeta;
    }

    public function hasNext(): bool {
        return isset($this->links['next']) || ($this->pageMeta?->hasNextPage() ?? false);
    }

    public function getNextLink(): ?string {
        return $this->links['next'] ?? null;
    }

    public function isEmpty(): bool {
        return $this->items === null || $this->items->isEmpty();
    }
}
