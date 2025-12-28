<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccount;
use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccounts;
use InvalidArgumentException;

class GeneralLedgerAccountsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        if (!isset($this->fiscalYearId)) {
            $this->logError('Fiscal Year ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Fiscal Year ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/general-ledger-accounts";
    }

    public function get(?ID $id = null): ?GeneralLedgerAccount {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $accountId = null): ?GeneralLedgerAccount {
        if (is_null($accountId)) {
            $this->logError('General Ledger Account ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('General Ledger Account ID is required');
        }

        $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$accountId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return GeneralLedgerAccount::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?GeneralLedgerAccounts {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return GeneralLedgerAccounts::fromJson($response, self::$logger);
    }

    public function searchUtilized(array $queryParams = [], array $options = []): ?GeneralLedgerAccounts {
        $response = parent::getContents($queryParams, $options, "{$this->getBaseUrl()}/utilized");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return GeneralLedgerAccounts::fromJson($response, self::$logger);
    }
}
