<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\Debitors\Debitor;
use Datev\Entities\Accounting\Debitors\Debitors;
use InvalidArgumentException;

class DebitorsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/debitors";
    }

    public function get(?ID $id = null): ?Debitor {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $debitorId = null): ?Debitor {
        if (is_null($debitorId)) {
            $this->logError('Debitor ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Debitor ID is required');
        }

        $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$debitorId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Debitor::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?Debitors {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Debitors::fromJson($response, self::$logger);
    }

    public function getNextAvailable(?int $startAt = null): ?int {
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
    }
}
