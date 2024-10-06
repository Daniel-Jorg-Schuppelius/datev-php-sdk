<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Address.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
