<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupType;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupTypes;
use InvalidArgumentException;

class ClientGroupTypesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'client-group-types';

    public function get(?ID $id = null): ?ClientGroupType {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $id = null): ?ClientGroupType {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientGroupType::fromJson($response, self::$logger);
        }, "Fetching ClientGroupType (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?ClientGroupTypes {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ClientGroupTypes::fromJson($response, self::$logger);
        }, 'Searching ClientGroupTypes');
    }
}
