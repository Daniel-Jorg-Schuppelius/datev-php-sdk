<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobLocation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

use Psr\Http\Message\ResponseInterface;

/**
 * Verweis auf einen asynchron angelegten Job (202/201 + Location-Header).
 *
 * DATEV liefert Location live als absolute URL inkl. /platform/vN-Basispfad;
 * getPath() normalisiert auf den Pfad, damit die URL sowohl live (gerootet,
 * passiert das Prefixing unverändert) als auch im Mock (relativ) funktioniert.
 */
final class JobLocation {
    public readonly string $location;

    public readonly ?int $retryAfter;

    public function __construct(string $location, ?int $retryAfter = null) {
        $this->location = $location;
        $this->retryAfter = $retryAfter;
    }

    /**
     * Erzeugt eine JobLocation aus einer 201/202-Response
     * (Location- und Retry-After-Header), sofern vorhanden.
     */
    public static function fromResponse(ResponseInterface $response): ?self {
        $location = $response->getHeaderLine('Location');

        if ($location === '') {
            return null;
        }

        return new self($location, JobPoller::retryAfterSeconds($response));
    }

    /**
     * Pfad der Location ohne Schema und Host (absolute URLs werden normalisiert).
     */
    public function getPath(): string {
        if (str_starts_with($this->location, 'http://') || str_starts_with($this->location, 'https://')) {
            $path = parse_url($this->location, PHP_URL_PATH);

            return is_string($path) ? $path : $this->location;
        }

        return $this->location;
    }

    /**
     * Job-ID (letztes Pfadsegment der Location).
     */
    public function getJobId(): string {
        $path = rtrim($this->getPath(), '/');
        $pos = strrpos($path, '/');

        return $pos === false ? $path : substr($path, $pos + 1);
    }
}
