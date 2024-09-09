<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces\API;

use APIToolkit\Contracts\Interfaces\API\EndpointInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use Datev\Contracts\Interfaces\ResourceInterface;
use APIToolkit\Entities\ID;

interface ExtendedEndpointInterface extends EndpointInterface {
    public function create(NamedEntityInterface $data, ID $id = null): ResourceInterface;
    public function update(ID $id, NamedEntityInterface $data): ResourceInterface;
    public function delete(ID $id): bool;
}
