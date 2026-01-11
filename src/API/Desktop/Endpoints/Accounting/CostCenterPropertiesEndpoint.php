<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterPropertiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperties;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperty;
use InvalidArgumentException;

class CostCenterPropertiesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID is required');
        }

        if (!isset($this->fiscalYearId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Fiscal Year ID is required');
        }

        if (!isset($this->costSystemId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Cost System ID is required');
        }

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/cost-systems/{$this->costSystemId->toString()}/cost-center-properties";
    }

    public function get(?ID $id = null): ?CostCenterProperty {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $id = null): ?CostCenterProperty {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getBaseUrl()}/{$id}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CostCenterProperty::fromJson($response, self::$logger);
        }, "Fetching CostCenterProperty (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?CostCenterProperties {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CostCenterProperties::fromJson($response, self::$logger);
        }, 'Searching CostCenterProperties');
    }
}
