<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\CostCenters\CostCenter;
use Datev\Entities\Accounting\CostCenters\CostCenters;
use InvalidArgumentException;

class CostCentersEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;
    protected ID $costSystemId;

    public function setClientId(ID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setFiscalYearId(ID $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    public function setCostSystemId(ID $costSystemId): void {
        $this->costSystemId = $costSystemId;
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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/cost-systems/{$this->costSystemId->toString()}/cost-centers";
    }

    public function get(?ID $id = null): ?CostCenter {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $costCenterId = null): ?CostCenter {
        if (is_null($costCenterId)) {
            $this->logError('Cost Center ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Cost Center ID is required');
        }

        $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$costCenterId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CostCenter::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?CostCenters {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CostCenters::fromJson($response, self::$logger);
    }
}
