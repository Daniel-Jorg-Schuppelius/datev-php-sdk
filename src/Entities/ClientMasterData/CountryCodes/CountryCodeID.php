<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountryCodeID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\CountryCodes;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class CountryCodeID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'id';
    }

    public function isValid(): bool {
        return is_string($this->value) && strlen($this->value) === 2;
    }
}
