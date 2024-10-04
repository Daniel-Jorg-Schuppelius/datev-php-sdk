<?php

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\NotFoundException;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilities;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;

class AreaOfResponsibilitiesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'area-of-responsibilities';

    public function get(?ID $id = null): AreaOfResponsibility {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }
        $areaOfResponsibilities = $this->search()->getValues("id", $id->toString());
        $result = array_pop($areaOfResponsibilities);

        if (is_null($result)) {
            throw new NotFoundException('Resource not found', 404);
        }

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): AreaOfResponsibilities {
        return AreaOfResponsibilities::fromJson(parent::getContents($queryParams, $options));
    }
}
