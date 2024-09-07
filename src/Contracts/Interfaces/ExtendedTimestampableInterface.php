<?php

declare(strict_types=1);

namespace Datev\Contracts\Interfaces;

use DateTime;

interface ExtendedTimestampableInterface extends TimestampableInterface {
    public function getUpdatedDate(): ?DateTime;
}
