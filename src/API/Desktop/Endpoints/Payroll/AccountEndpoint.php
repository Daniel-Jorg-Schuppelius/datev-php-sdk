<?php

namespace Datev\Api\Desktop\Endpoints\Payroll;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use Datev\Entities\Accounting\Client;
use Datev\Entities\Accounting\Clients;
use Datev\Entities\ID;

class AccountEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $baseEndpoint = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): Client {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return Client::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/account"));
    }

    public function search(array $queryParams = [], array $options = []): Clients {
        return Clients::fromJson(parent::getContents($queryParams, [], $this->getEndpointUrl(), 200));
    }
}