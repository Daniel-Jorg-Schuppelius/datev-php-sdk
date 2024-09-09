<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces;

use APIToolkit\Entities\ID;

interface IdentifiableInterface {
    public function getID(): ?ID;
}
