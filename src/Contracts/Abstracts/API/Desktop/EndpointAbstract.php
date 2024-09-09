<?php

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Desktop;

use APIToolkit\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;

abstract class EndpointAbstract extends APIEndpointAbstract {
    protected function getEndpointUrl(): string {
        return "/datev/api/{$this->endpointPrefix}/{$this->endpoint}";
    }
}
