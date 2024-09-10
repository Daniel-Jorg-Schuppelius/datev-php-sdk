<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Insurances\Social;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

class SocialInsurances extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = SocialInsurance::class;

        parent::__construct($data, $logger);
    }
}