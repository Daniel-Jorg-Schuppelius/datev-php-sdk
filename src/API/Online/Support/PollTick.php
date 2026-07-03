<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PollTick.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

/**
 * Ergebnis eines einzelnen Poll-Schritts des JobPollers.
 */
final class PollTick {
    private function __construct(
        public readonly bool $done,
        public readonly mixed $result = null,
        public readonly ?int $retryAfter = null
    ) {}

    /**
     * Der Job hat einen Endzustand erreicht; $result wird vom Poller zurückgegeben.
     */
    public static function done(mixed $result = null): self {
        return new self(true, $result);
    }

    /**
     * Der Job läuft noch; optional mit Wartezeit aus einem Retry-After-Header.
     */
    public static function waiting(?int $retryAfter = null): self {
        return new self(false, null, $retryAfter);
    }
}
