<?php

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategories;
use Datev\Entities\ClientMasterData\ClientCategories\ClientCategory;
use Datev\Entities\ClientMasterData\Clients\ClientID;
use Psr\Log\LoggerInterface;

class ClientCategoriesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'clients/{client-id}/client-categories';

    protected ClientID $clientID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID()) {
        parent::__construct($client, $logger);
        $this->clientID = $clientID;
    }

    public function get(?ID $id = null): ClientCategory {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return ClientCategory::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): ClientCategories {
        return ClientCategories::fromJson(parent::getContents($queryParams, $options));
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
