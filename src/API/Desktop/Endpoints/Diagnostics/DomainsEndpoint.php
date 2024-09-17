<?php

namespace Datev\API\Desktop\Endpoints\Diagnostics;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\Diagnostics\Domains\Domains;

class DomainsEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'diagnostics/v1';
    protected string $endpoint = 'domains';

    public function get(?ID $id = null): Domains {
        return Domains::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}"));
    }
}
