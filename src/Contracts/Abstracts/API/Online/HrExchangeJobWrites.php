<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrExchangeJobWrites.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * Gemeinsamer Schreibhelfer für hr:exchange: alle Schreiboperationen
 * antworten asynchron (202) mit einem Job-Objekt.
 */
trait HrExchangeJobWrites {
    /**
     * @param array<string, mixed> $data
     * @param int|array<int, int> $expectedStatusCodes
     * @param array<string, string> $headers
     */
    protected function writeJob(string $method, ?string $urlPath, array $data = [], int|array $expectedStatusCodes = 202, array $headers = []): ?Job {
        $options = [];
        if ($method !== 'DELETE') {
            $options['json'] = $data;
        }
        if (!empty($headers)) {
            $options['headers'] = $headers;
        }

        $response = $this->requestResponse($method, $urlPath, $options, $expectedStatusCodes);
        $body = (string) $response->getBody();

        if ($body === '' || $body === '[]') {
            return null;
        }

        return Job::fromJson($body, self::$logger);
    }
}
