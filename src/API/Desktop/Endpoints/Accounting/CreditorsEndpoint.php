<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\Creditors\Creditor;
use Datev\Entities\Accounting\Creditors\Creditors;
use InvalidArgumentException;

class CreditorsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/creditors";
    }

    public function get(?ID $id = null): ?Creditor {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $creditorId = null): ?Creditor {
        if (is_null($creditorId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Creditor ID is required');
        }

        return $this->logDebugWithTimer(function () use ($creditorId) {
            $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$creditorId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Creditor::fromJson($response, self::$logger);
        }, "Fetching Creditor (ID: {$creditorId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Creditors {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Creditors::fromJson($response, self::$logger);
        }, 'Searching Creditors');
    }

    public function getNextAvailable(?int $startAt = null): ?int {
        return $this->logDebugWithTimer(function () use ($startAt) {
            $url = "{$this->getBaseUrl()}/next-available";
            if ($startAt !== null) {
                $url .= "?start-at={$startAt}";
            }

            $response = parent::getContents([], [], $url);

            if (empty($response) || $response === '[]') {
                return null;
            }

            $data = json_decode($response, true);
            return $data['account_number'] ?? null;
        }, 'Fetching next available Creditor number');
    }
}
