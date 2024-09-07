<?php

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Desktop;

use Datev\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;

abstract class EndpointAbstract extends APIEndpointAbstract {
    protected function getEndpointUrl(): string {
        return "/datev/api/{$this->baseEndpoint}/{$this->endpoint}";
    }
}
