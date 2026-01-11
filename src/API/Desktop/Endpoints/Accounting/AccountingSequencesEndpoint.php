<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSequencesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\Sequences\Sequence;
use InvalidArgumentException;

class AccountingSequencesEndpoint extends EndpointAbstract {
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/accounting-sequences";
    }

    public function get(?ID $id = null): ?Sequence {
        // This endpoint only supports POST for creating sequences
        // Use AccountingSequencesProcessedEndpoint for reading sequences
        return null;
    }

    public function create(Sequence $sequence): bool {
        return $this->logDebugWithTimer(function () use ($sequence) {
            $response = parent::postContents($sequence->toArray(), [], $this->getBaseUrl());

            return $response !== null;
        }, 'Creating Sequence');
    }
}
