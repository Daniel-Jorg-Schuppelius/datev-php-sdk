<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MetersEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Meters\Meter;
use Datev\Entities\PublicSector\Meters\Meters;
use InvalidArgumentException;

class MetersEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

    public function get(?ID $id = null): ?Meter {
        return $this->getById($id?->toString());
    }

    public function getById(?string $meterId = null): ?Meter {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID and Fee ID are required');
        }

        if (is_null($meterId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Meter ID is required');
        }

        return $this->logDebugWithTimer(function () use ($meterId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$meterId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Meter::fromJson($response, self::$logger);
        }, "Fetching Meter (ID: {$meterId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Meters {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID and Fee ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Meters::fromJson($response, self::$logger);
        }, "Searching Meters");
    }
}
