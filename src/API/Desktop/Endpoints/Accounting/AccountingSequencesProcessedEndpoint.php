<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSequencesProcessedEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\SequenceReads\SequenceRead;
use Datev\Entities\Accounting\SequenceReads\SequenceReads;
use InvalidArgumentException;

class AccountingSequencesProcessedEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/accounting-sequences-processed";
    }

    public function get(?ID $id = null): ?SequenceRead {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $sequenceId = null): ?SequenceRead {
        if (is_null($sequenceId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Sequence ID is required');
        }

        return $this->logDebugWithTimer(function () use ($sequenceId) {
            $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$sequenceId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return SequenceRead::fromJson($response, self::$logger);
        }, "Fetching SequenceRead (ID: {$sequenceId})");
    }

    public function search(array $queryParams = [], array $options = []): ?SequenceReads {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

            if (empty($response) || $response === '[]') {
                return null;
            }

            return SequenceReads::fromJson($response, self::$logger);
        }, 'Searching SequenceReads');
    }
}
