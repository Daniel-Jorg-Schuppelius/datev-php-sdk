<?php

namespace Datev\Api\Desktop\Endpoints\Payroll;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use Datev\Entities\Payroll\Client;
use Datev\Entities\Payroll\Clients;
use Datev\Entities\ID;
use InvalidArgumentException;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $baseEndpoint = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): Client {
        if (is_null($id)) {
            throw new InvalidArgumentException('ID is required');
        }

        return Client::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): Clients {
        if (!isset($queryParams['reference-date'])) {
            throw new InvalidArgumentException('reference-date is required in $queryParams');
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $queryParams['reference-date'])) {
            throw new InvalidArgumentException('reference-date must be in the format yyyy-mm-dd');
        }

        return Clients::fromJson(parent::getContents($queryParams, $options));
    }
}