<?php

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\Documents\Document;
use Datev\Entities\DocumentManagement\Documents\Documents;

class DocumentsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documents';

    public function get(?ID $id = null): Document {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return Document::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): Documents {
        return Documents::fromJson(parent::getContents($queryParams, $options));
    }
}
