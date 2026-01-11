<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingTransactionKeysEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKey;
use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKeys;
use InvalidArgumentException;

class AccountingTransactionKeysEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/accounting-transaction-keys";
    }

    public function get(?ID $id = null): ?AccountingTransactionKey {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $id = null): ?AccountingTransactionKey {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$id}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return AccountingTransactionKey::fromJson($response, self::$logger);
        }, "Fetching AccountingTransactionKey (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?AccountingTransactionKeys {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

            if (empty($response) || $response === '[]') {
                return null;
            }

            return AccountingTransactionKeys::fromJson($response, self::$logger);
        }, 'Searching AccountingTransactionKeys');
    }
}
