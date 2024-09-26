<?php

namespace Datev\API\Desktop\Endpoints\Diagnostics;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\Diagnostics\EchoResponse\EchoResponse;

class EchoEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'diagnostics/v1';
    protected string $endpoint = 'echo';

    public function get(?ID $id = null): EchoResponse {
        return EchoResponse::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}"));
    }
}
