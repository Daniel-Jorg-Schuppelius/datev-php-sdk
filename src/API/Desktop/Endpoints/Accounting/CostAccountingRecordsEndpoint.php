<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecordsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecord;
use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecords;
use InvalidArgumentException;

class CostAccountingRecordsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;
    protected ID $costSystemId;
    protected ID $costSequenceId;

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    public function setCostSystemId(ID $costSystemId): void {
        $this->costSystemId = $costSystemId;
    }

    public function setCostSequenceId(ID $costSequenceId): void {
        $this->costSequenceId = $costSequenceId;
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

        if (!isset($this->costSystemId)) {
            $this->logError('Cost System ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Cost System ID is required');
        }

        if (!isset($this->costSequenceId)) {
            $this->logError('Cost Sequence ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Cost Sequence ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/cost-systems/{$this->costSystemId->toString()}/cost-sequences/{$this->costSequenceId->toString()}/cost-accounting-records";
    }

    public function get(?ID $id = null): ?CostAccountingRecord {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $recordId = null): ?CostAccountingRecord {
        if (is_null($recordId)) {
            $this->logError('Cost Accounting Record ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Cost Accounting Record ID is required');
        }

        $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$recordId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CostAccountingRecord::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?CostAccountingRecords {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CostAccountingRecords::fromJson($response, self::$logger);
    }
}
