<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRulesOutgoingInvoicesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRule;
use Datev\Entities\Accounting\PostingProposalRules\PostingProposalRules;
use InvalidArgumentException;

class PostingProposalRulesOutgoingInvoicesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    protected function getBaseUrl(): string {
        if (!isset($this->clientId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID is required');
        }

        if (!isset($this->fiscalYearId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Fiscal Year ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/posting-proposal-rules-outgoing-invoices";
    }

    public function get(?ID $id = null): ?PostingProposalRule {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $ruleId = null): ?PostingProposalRule {
        if (is_null($ruleId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Posting Proposal Rule ID is required');
        }

        return $this->logDebugWithTimer(function () use ($ruleId) {
            $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$ruleId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return PostingProposalRule::fromJson($response, self::$logger);
        }, "Fetching PostingProposalRule (ID: {$ruleId})");
    }

    public function search(array $queryParams = [], array $options = []): ?PostingProposalRules {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

            if (empty($response) || $response === '[]') {
                return null;
            }

            return PostingProposalRules::fromJson($response, self::$logger);
        }, 'Searching PostingProposalRules (OutgoingInvoices)');
    }
}
