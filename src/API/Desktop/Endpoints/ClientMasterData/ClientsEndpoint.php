<?php

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\NotFoundException;
use Datev\Entities\ClientMasterData\Clients\Client;
use Datev\Entities\ClientMasterData\Clients\Clients;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): Client {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }
        $clients = $this->search()->getValues("id", $id->toString());
        $result = array_pop($clients);

        if (is_null($result)) {
            throw new NotFoundException('Resource not found', 404);
        }

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): Clients {
        return Clients::fromJson(parent::getContents($queryParams, $options));
    }
}
