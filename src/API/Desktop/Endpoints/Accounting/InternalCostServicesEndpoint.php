<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InternalCostServicesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Accounting;

use Datev\Contracts\Interfaces\API\PostableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\InternalCostServices\InternalCostService;
use Datev\Entities\Accounting\InternalCostServices\InternalCostServices;
use InvalidArgumentException;

class InternalCostServicesEndpoint extends EndpointAbstract implements PostableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    protected ID $clientId;
    protected ID $fiscalYearId;
    protected ID $costSystemId;

    public function get(?ID $id = null): ?InternalCostService {
        return null;
    }

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

        return "{$this->getEndpointUrl()}/{$this->clientId->toString()}/fiscal-years/{$this->fiscalYearId->toString()}/cost-systems/{$this->costSystemId->toString()}/internal-cost-services";
    }

    public function create($data): ?InternalCostService {
        $response = parent::postContents($data->toArray(), [], $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return InternalCostService::fromJson($response, self::$logger);
    }
}
