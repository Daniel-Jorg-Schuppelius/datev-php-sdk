<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces;

use DateTime;
use Datev\Contracts\Interfaces\IdentifiableInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;

interface ResourceInterface extends IdentifiableInterface {
    public function getResourceUri(): string;
    public function getCreatedDate(): DateTime;
    public function getUpdatedDate(): DateTime;

    public function getResource(): NamedEntityInterface;
}
