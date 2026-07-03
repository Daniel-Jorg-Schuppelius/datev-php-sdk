<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobLocationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API\Online\Support;

use Datev\API\Online\Support\JobLocation;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JobLocationTest extends TestCase {
    public function test_from_response_with_absolute_location(): void {
        $response = new Response(202, [
            'Location' => 'https://accounting-extf-files.api.datev.de/platform/v3/clients/29098-100/extf-files/jobs/f81d4fae-7dec-11d0-a765-00a0c91e6bf6',
            'Retry-After' => '2',
        ]);

        $jobLocation = JobLocation::fromResponse($response);

        $this->assertNotNull($jobLocation);
        $this->assertSame('/platform/v3/clients/29098-100/extf-files/jobs/f81d4fae-7dec-11d0-a765-00a0c91e6bf6', $jobLocation->getPath());
        $this->assertSame('f81d4fae-7dec-11d0-a765-00a0c91e6bf6', $jobLocation->getJobId());
        $this->assertSame(2, $jobLocation->retryAfter);
    }

    public function test_from_response_with_relative_location(): void {
        $response = new Response(202, ['Location' => 'clients/29098-100/extf-files/jobs/abc-123']);

        $jobLocation = JobLocation::fromResponse($response);

        $this->assertNotNull($jobLocation);
        $this->assertSame('clients/29098-100/extf-files/jobs/abc-123', $jobLocation->getPath());
        $this->assertSame('abc-123', $jobLocation->getJobId());
        $this->assertNull($jobLocation->retryAfter);
    }

    public function test_from_response_without_location(): void {
        $this->assertNull(JobLocation::fromResponse(new Response(202)));
    }
}
