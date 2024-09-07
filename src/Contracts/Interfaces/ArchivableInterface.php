<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces;

interface ArchivableInterface {
    public function isArchived(): bool;
}
