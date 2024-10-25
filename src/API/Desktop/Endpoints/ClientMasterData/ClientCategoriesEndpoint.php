<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientCategoriesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategories;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategory;
use Datev\Entities\ClientMasterData\Clients\ClientID;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class ClientCategoriesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'clients/{client-id}';
    protected string $endpointSuffix = 'client-categories';

    protected ClientID $clientID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID()) {
        parent::__construct($client, $logger);
        $this->clientID = $clientID;
    }

    public function get(?ID $id = null): ?ClientCategory {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientCategory::fromJson($response, $this->logger);
    }

    public function searchByClient(array $queryParams = [], array $options = []): ?ClientCategories {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientCategories::fromJson($response, $this->logger);
    }

    public function search(array $queryParams = [], array $options = []): ?ClientCategories {
        // TODO: Check API, on documentation, this endpoint exists but it is not implemented?
        $response = parent::getContents($queryParams, $options, "{$this->endpointPrefix}/{$this->endpointSuffix}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientCategories::fromJson($response, $this->logger);
    }

    public function getClientID(): ClientID {
        return $this->clientID;
    }

    public function setClientID(ClientID $clientID): void {
        $this->clientID = $clientID;
    }

    protected function getEndpointUrl(): string {
        return str_replace('{client-id}', $this->clientID->toString(), parent::getEndpointUrl());
    }
}
