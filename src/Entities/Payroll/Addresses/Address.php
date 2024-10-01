<?php

declare(strict_types=1);

namespace Datev\Entities\Payroll\Addresses;

use Datev\Entities\Common\Addresses\Address as CommonAddress;
use Psr\Log\LoggerInterface;

class Address extends CommonAddress {
    protected ?string $house_number;
    protected ?string $country;
    protected ?string $address_affix;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
