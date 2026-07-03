<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobPollerTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online\Support;

use Datev\API\Online\Support\{JobPoller, PollTick};
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class JobPollerTest extends TestCase {
    public function test_returns_result_when_done_immediately(): void {
        $poller = new JobPoller(10, 1);

        $result = $poller->poll(fn () => PollTick::done('finished'));

        $this->assertSame('finished', $result);
    }

    public function test_polls_until_done(): void {
        $poller = new JobPoller(10, 0);
        $attempts = 0;

        $result = $poller->poll(function () use (&$attempts) {
            $attempts++;

            return $attempts < 3 ? PollTick::waiting(0) : PollTick::done($attempts);
        });

        $this->assertSame(3, $result);
        $this->assertSame(3, $attempts);
    }

    public function test_throws_on_timeout(): void {
        $poller = new JobPoller(1, 1);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('timed out');

        $poller->poll(fn () => PollTick::waiting(1));
    }

    public function test_retry_after_seconds_from_numeric_header(): void {
        $response = new Response(202, ['Retry-After' => '7']);

        $this->assertSame(7, JobPoller::retryAfterSeconds($response));
    }

    public function test_retry_after_seconds_from_http_date(): void {
        $response = new Response(202, ['Retry-After' => gmdate('D, d M Y H:i:s \G\M\T', time() + 30)]);

        $seconds = JobPoller::retryAfterSeconds($response);
        $this->assertNotNull($seconds);
        $this->assertGreaterThanOrEqual(25, $seconds);
        $this->assertLessThanOrEqual(30, $seconds);
    }

    public function test_retry_after_seconds_missing_header(): void {
        $response = new Response(202);

        $this->assertNull(JobPoller::retryAfterSeconds($response));
    }
}
