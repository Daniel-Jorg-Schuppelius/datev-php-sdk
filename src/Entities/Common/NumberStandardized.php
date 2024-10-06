<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NumberStandardized.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common;

use APIToolkit\Entities\Contact\PhoneNumber as BasePhoneNumber;
use Psr\Log\LoggerInterface;

class NumberStandardized extends BasePhoneNumber {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'number_standardized';
    }

    public function isValid(): bool {
        if (preg_match('/^00[0-9]{9,15}$/', $this->value)) {
            return true;
        }

        return false;
    }
}
