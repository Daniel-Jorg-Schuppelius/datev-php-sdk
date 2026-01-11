<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Fees\Fee;
use Datev\Entities\PublicSector\Fees\Fees;
use InvalidArgumentException;

class FeesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;
    protected GUID $citizenId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setCitizenId(GUID $citizenId): void {
        $this->citizenId = $citizenId;
    }

    public function get(?ID $id = null): ?Fee {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $feeId = null): ?Fee {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        if (is_null($feeId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Fee ID is required');
        }

        return $this->logDebugWithTimer(function () use ($feeId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$feeId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Fee::fromJson($response, self::$logger);
        }, "Fetching Fee (ID: {$feeId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Fees {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Fees::fromJson($response, self::$logger);
        }, "Searching Fees");
    }
}
