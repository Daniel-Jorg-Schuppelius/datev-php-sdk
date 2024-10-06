<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExtendedEndpointInterface.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Interfaces\API;

use APIToolkit\Contracts\Interfaces\API\EndpointInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Interfaces\ResourceInterface;

interface ExtendedEndpointInterface extends EndpointInterface {
    public function create(NamedEntityInterface $data, ID $id = null): ResourceInterface;
    public function update(ID $id, NamedEntityInterface $data): ResourceInterface;
    public function delete(ID $id): bool;
}
