<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces\API;

use APIToolkit\Contracts\Abstracts\NamedValues;

interface ListableEndpointInterface extends EndpointInterface {
    public function list(array $options = []): NamedValues;
}
