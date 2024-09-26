<?php

namespace Datev\Contracts\Abstracts\API;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;

abstract class IndividualReferencesAbstract extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'individual-references';

    public function get(?ID $id = null): IndividualReferences {
        return IndividualReferences::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}"));
    }

    public function search(array $queryParams = [], array $options = []): IndividualReferences {
        return IndividualReferences::fromJson(parent::getContents($queryParams, $options));
    }
}
