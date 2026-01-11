<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CitizensEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Citizens\Citizen;
use Datev\Entities\PublicSector\Citizens\Citizens;
use InvalidArgumentException;

class CitizensEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function get(?ID $id = null): ?Citizen {
        if ($id instanceof GUID) {
            return $this->getByGuid($id);
        }
        return $this->getByGuid($id !== null ? new GUID($id->toString()) : null);
    }

    public function getByGuid(?GUID $citizenId = null): ?Citizen {
        if (!isset($this->clientId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID is required');
        }

        if (is_null($citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Citizen ID is required');
        }

        return $this->logDebugWithTimer(function () use ($citizenId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$citizenId->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Citizen::fromJson($response, self::$logger);
        }, "Fetching Citizen (ID: {$citizenId})");
    }

    public function search(array $queryParams = [], array $options = []): ?Citizens {
        if (!isset($this->clientId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID is required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Citizens::fromJson($response, self::$logger);
        }, "Searching Citizens");
    }
}
