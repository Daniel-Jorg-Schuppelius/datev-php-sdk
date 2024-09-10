<?php

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use APIToolkit\Contracts\Abstracts\API\EndpointAbstract as APIEndpointAbstract;

abstract class EndpointAbstract extends APIEndpointAbstract {
    protected function getEndpointUrl(): string {
        return "{$this->endpointPrefix}/{$this->endpoint}";
    }
}
