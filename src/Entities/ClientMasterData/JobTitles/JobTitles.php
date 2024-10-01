<?php

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\JobTitles;

use Datev\Contracts\Abstracts\DateTimeNamedValues;
use Psr\Log\LoggerInterface;

class JobTitles extends DateTimeNamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = JobTitle::class;

        parent::__construct($data, $logger);
    }
}
