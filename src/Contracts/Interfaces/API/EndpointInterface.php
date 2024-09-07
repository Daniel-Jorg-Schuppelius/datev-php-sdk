<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces\API;

use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use Datev\Entities\ID;

interface EndpointInterface {
    public function get(?ID $id = null): NamedEntityInterface;
}
