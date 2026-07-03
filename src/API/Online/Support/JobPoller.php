<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobPoller.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Support;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;

/**
 * Pollt asynchrone Jobs der DATEV-Online-Dienste bis zum Endzustand.
 *
 * Die Dienste nutzen unterschiedliche Async-Muster (202+Location,
 * State-Endpoint, mehrstufige Jobs); die Variation steckt allein im
 * $check-Callable, das pro Schritt einen PollTick liefert.
 */
final class JobPoller {
    private int $maxWaitSeconds;

    private int $defaultIntervalSeconds;

    private ?LoggerInterface $logger;

    public function __construct(int $maxWaitSeconds = 300, int $defaultIntervalSeconds = 5, ?LoggerInterface $logger = null) {
        $this->maxWaitSeconds = max(1, $maxWaitSeconds);
        $this->defaultIntervalSeconds = max(1, $defaultIntervalSeconds);
        $this->logger = $logger;
    }

    /**
     * Führt $check wiederholt aus, bis PollTick::done() geliefert wird oder
     * die maximale Wartezeit überschritten ist.
     *
     * @param callable(): PollTick $check Ein einzelner Poll-Schritt
     * @return mixed Das Ergebnis aus PollTick::done()
     * @throws RuntimeException Wenn die maximale Wartezeit überschritten wird
     */
    public function poll(callable $check): mixed {
        $deadline = time() + $this->maxWaitSeconds;
        $attempt = 0;

        while (true) {
            $attempt++;
            $tick = $check();

            if ($tick->done) {
                $this->logger?->debug("Job polling finished after {$attempt} attempt(s)");

                return $tick->result;
            }

            $remaining = $deadline - time();
            if ($remaining <= 0) {
                throw new RuntimeException("Job polling timed out after {$this->maxWaitSeconds} seconds ({$attempt} attempts)");
            }

            $interval = $tick->retryAfter ?? $this->defaultIntervalSeconds;
            $sleep = min(max(0, $interval), $remaining);

            $this->logger?->debug("Job still running (attempt {$attempt}), sleeping {$sleep}s");

            if ($sleep > 0) {
                sleep($sleep);
            }
        }
    }

    /**
     * Liest den Retry-After-Header einer Response (Delta-Sekunden oder HTTP-Datum).
     */
    public static function retryAfterSeconds(ResponseInterface $response): ?int {
        $value = $response->getHeaderLine('Retry-After');

        if ($value === '') {
            return null;
        }

        if (is_numeric($value)) {
            return max(0, (int) $value);
        }

        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return null;
        }

        return max(0, $timestamp - time());
    }
}
