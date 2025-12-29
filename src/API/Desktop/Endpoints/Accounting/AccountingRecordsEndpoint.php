<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingRecordsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\RecordReads\RecordRead;
use Datev\Entities\Accounting\RecordReads\RecordReads;
use InvalidArgumentException;

class AccountingRecordsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;
    protected ID $sequenceId;

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    public function setSequenceId(ID $sequenceId): void {
        $this->sequenceId = $sequenceId;
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

        if (!isset($this->sequenceId)) {
            $this->logError('Sequence ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Sequence ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/accounting-sequences-processed/{$this->sequenceId->toString()}/accounting-records";
    }

    public function get(?ID $id = null): ?RecordRead {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $recordId = null): ?RecordRead {
        if (is_null($recordId)) {
            $this->logError('Record ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Record ID is required');
        }

        $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$recordId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return RecordRead::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?RecordReads {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return RecordReads::fromJson($response, self::$logger);
    }
}
