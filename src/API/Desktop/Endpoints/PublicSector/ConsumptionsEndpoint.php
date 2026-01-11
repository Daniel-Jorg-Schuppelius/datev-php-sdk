<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsumptionsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Consumptions\Consumption;
use Datev\Entities\PublicSector\Consumptions\Consumptions;
use InvalidArgumentException;

class ConsumptionsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;
    protected GUID $citizenId;
    protected int $feeId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setCitizenId(GUID $citizenId): void {
        $this->citizenId = $citizenId;
    }

    public function setFeeId(int $feeId): void {
        $this->feeId = $feeId;
    }

    public function get(?ID $id = null): ?Consumption {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $consumptionId = null): ?Consumption {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID and Fee ID are required');
        }

        if (is_null($consumptionId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Consumption ID is required');
        }

        return $this->logDebugWithTimer(function () use ($consumptionId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/consumptions/{$consumptionId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Consumption::fromJson($response, self::$logger);
        }, "Fetching Consumption (ID: {$consumptionId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Consumptions {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID and Fee ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/consumptions");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Consumptions::fromJson($response, self::$logger);
        }, "Searching Consumptions");
    }
}
