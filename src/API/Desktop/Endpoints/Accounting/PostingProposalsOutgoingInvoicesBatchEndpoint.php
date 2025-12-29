<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalsOutgoingInvoicesBatchEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use Datev\Contracts\Interfaces\API\PostableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use InvalidArgumentException;

class PostingProposalsOutgoingInvoicesBatchEndpoint extends EndpointAbstract implements PostableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;

    public function get(?ID $id = null): ?NamedEntityInterface {
        return null;
    }

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    protected function getBaseUrl(): string {
        if (!isset($this->clientId)) {
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        if (!isset($this->fiscalYearId)) {
            $this->logError('Fiscal Year ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Fiscal Year ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/posting-proposals-outgoing-invoices/batch";
    }

    public function create($data): ?array {
        $response = parent::postContents($data, [], $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return json_decode($response, true);
    }
}
