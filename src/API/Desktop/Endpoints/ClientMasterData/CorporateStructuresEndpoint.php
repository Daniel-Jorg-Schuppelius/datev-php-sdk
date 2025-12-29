<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorporateStructuresEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructure;
use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructures;
use Datev\Entities\ClientMasterData\Establishments\Establishment;
use InvalidArgumentException;

class CorporateStructuresEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'corporate-structures';

    public function get(?ID $id = null): ?CorporateStructure {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $id = null): ?CorporateStructure {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CorporateStructure::fromJson($response, self::$logger);
    }

    public function getEstablishment(?string $organizationId = null, ?string $establishmentId = null): ?Establishment {
        if (is_null($organizationId) || is_null($establishmentId)) {
            $this->logError('Organization ID and Establishment ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Organization ID and Establishment ID are required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$organizationId}/establishments/{$establishmentId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Establishment::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?CorporateStructures {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return CorporateStructures::fromJson($response, self::$logger);
    }
}
