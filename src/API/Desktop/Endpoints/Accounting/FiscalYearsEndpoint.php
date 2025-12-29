<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\FiscalYears\FiscalYear;
use Datev\Entities\Accounting\FiscalYears\FiscalYears;
use InvalidArgumentException;

class FiscalYearsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function get(?ID $id = null): ?FiscalYear {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $fiscalYearId = null): ?FiscalYear {
        if (!isset($this->clientId)) {
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        if (is_null($fiscalYearId)) {
            $this->logError('Fiscal Year ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Fiscal Year ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$fiscalYearId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return FiscalYear::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?FiscalYears {
        if (!isset($this->clientId)) {
            $this->logError('Client ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID is required');
        }

        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return FiscalYears::fromJson($response, self::$logger);
    }
}
