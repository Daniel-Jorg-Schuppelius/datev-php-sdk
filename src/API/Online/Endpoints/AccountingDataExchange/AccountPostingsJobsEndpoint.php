<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPostingsJobsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\AccountingDataExchange;

use APIToolkit\API\Pagination\LinkHeader;
use Datev\API\Online\Support\{PageMeta, PageResult};
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\AccountingDataExchange\AccountPostings\AccountPostings;

/**
 * Accounting Data Exchange v1: Ergebnis eines Buchungssatz-Export-Jobs
 * (application/x-ndjson, seitenweise über den page-Parameter und
 * x-current-page/x-total-pages-Header).
 */
class AccountPostingsJobsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'account-postings-jobs';

    /**
     * @return PageResult<\Datev\Entities\Online\AccountingDataExchange\AccountPostings\AccountPosting>
     */
    public function getPage(string $jobId, ?int $page = null): PageResult {
        return $this->logDebugWithTimer(function () use ($jobId, $page) {
            $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode($jobId);
            if ($page !== null) {
                $urlPath .= "?page={$page}";
            }

            $response = $this->requestResponse('GET', $urlPath, ['headers' => ['Accept' => 'application/x-ndjson']], 200);
            $rows = $this->parseNdjson((string) $response->getBody());

            return new PageResult(
                empty($rows) ? null : new AccountPostings($rows, self::$logger),
                null,
                LinkHeader::fromResponse($response),
                PageMeta::fromResponse($response)
            );
        }, "Fetching AccountPostings job result (ID: {$jobId}" . ($page !== null ? ", page {$page}" : '') . ')');
    }
}
