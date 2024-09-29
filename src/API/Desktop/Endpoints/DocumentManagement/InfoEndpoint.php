<?php

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\Infos\Info;

class InfoEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'info';

    public function get(?ID $id = null): Info {
        return Info::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}"));
    }
}
