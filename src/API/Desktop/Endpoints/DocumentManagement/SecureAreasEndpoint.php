<?php

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\NotFoundException;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;

class SecureAreasEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'secure-areas';

    public function get(?ID $id = null): SecureArea {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }
        $proptertyTemplates = $this->search()->getValues("id", $id->toString());
        $result = array_pop($proptertyTemplates);

        if (is_null($result)) {
            throw new NotFoundException('Resource not found', 404);
        }

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): SecureAreas {
        return SecureAreas::fromJson(parent::getContents($queryParams, $options));
    }
}
