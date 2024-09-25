<?php

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\Domains\Domain;
use Datev\Entities\DocumentManagement\Domains\Domains;

class DomainsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'domains';

    public function get(?ID $id = null): Domain {
        // if (is_null($id)) {
        //     throw new \InvalidArgumentException('ID is required');
        // }

        return Domain::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): Domains {
        return Domains::fromJson(parent::getContents($queryParams, $options));
    }
}
