<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DuesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\Dues\Due;
use Datev\Entities\PublicSector\Dues\Dues;
use InvalidArgumentException;

class DuesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

    public function get(?ID $id = null): ?Due {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logError('Client ID, Citizen ID and Fee ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID, Citizen ID and Fee ID are required');
        }

        if (is_null($id)) {
            return null;
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/dues/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Due::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?Dues {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId)) {
            $this->logError('Client ID, Citizen ID and Fee ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID, Citizen ID and Fee ID are required');
        }

        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/dues");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Dues::fromJson($response, self::$logger);
    }
}
