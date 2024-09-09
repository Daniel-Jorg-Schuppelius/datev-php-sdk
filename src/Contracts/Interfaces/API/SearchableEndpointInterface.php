<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces\API;

use APIToolkit\Contracts\Abstracts\NamedValues;
use APIToolkit\Contracts\Interfaces\API\EndpointInterface;

interface SearchableEndpointInterface extends EndpointInterface {
    public function search(array $queryParams = [], array $options = []): NamedValues;
}
