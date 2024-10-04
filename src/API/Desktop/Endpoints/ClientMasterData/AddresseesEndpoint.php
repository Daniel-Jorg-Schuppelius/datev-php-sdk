<?php

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\ClientMasterData\Addressees\Addressee;
use Datev\Entities\ClientMasterData\Addressees\Addressees;

class AddresseesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'addressees';

    public function get(?ID $id = null): Addressee {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return Addressee::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): Addressees {
        return Addressees::fromJson(parent::getContents($queryParams, $options));
    }
}
