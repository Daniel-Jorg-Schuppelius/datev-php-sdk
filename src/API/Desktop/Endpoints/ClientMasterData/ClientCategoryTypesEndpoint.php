<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoryTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryType;
use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryTypes;
use InvalidArgumentException;

class ClientCategoryTypesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'client-category-types';

    public function get(?ID $id = null): ?ClientCategoryType {
        if (is_null($id)) {
            return null;
        }
        return $this->getById($id->toString());
    }

    public function getById(?string $id = null): ?ClientCategoryType {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientCategoryType::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?ClientCategoryTypes {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientCategoryTypes::fromJson($response, self::$logger);
    }
}
