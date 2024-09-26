<?php

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;

class IndividualPropertiesEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'individual-properties';

    public function get(?ID $id = null): IndividualProperties {
        return IndividualProperties::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}"));
    }
}
