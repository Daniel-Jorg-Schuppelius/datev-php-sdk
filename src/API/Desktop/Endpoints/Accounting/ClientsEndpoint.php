<?php

namespace Datev\API\Desktop\Endpoints\Accounting;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use Datev\Entities\Accounting\Client;
use Datev\Entities\Accounting\Clients;
use APIToolkit\Entities\ID;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): Client {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return Client::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): Clients {
        return Clients::fromJson(parent::getContents($queryParams, $options));
    }
}