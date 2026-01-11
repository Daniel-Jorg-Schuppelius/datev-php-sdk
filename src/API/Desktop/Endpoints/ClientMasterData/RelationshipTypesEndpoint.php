<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipType;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipTypes;

class RelationshipTypesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'relationship-types';

    public function get(?ID $id = null): ?RelationshipType {
        return null;
    }

    public function search(array $queryParams = [], array $options = []): ?RelationshipTypes {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return RelationshipTypes::fromJson($response, self::$logger);
        }, 'Searching RelationshipTypes');
    }
}
