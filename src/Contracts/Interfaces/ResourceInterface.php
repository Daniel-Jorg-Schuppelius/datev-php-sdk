<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces;

use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use DateTime;

interface ResourceInterface extends NamedEntityInterface {
    public function getResourceUri(): string;
    public function getCreatedDate(): DateTime;
    public function getUpdatedDate(): DateTime;

    public function getResource(): NamedEntityInterface;
}
