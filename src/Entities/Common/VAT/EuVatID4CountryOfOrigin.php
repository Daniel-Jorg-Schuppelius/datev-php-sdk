<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EuVatID4CountryOfOrigin.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common\VAT;

use APIToolkit\Entities\Tax\VAT;
use Psr\Log\LoggerInterface;

class EuVatID4CountryOfOrigin extends VAT {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'eu_vat_id_for_country_of_origin';
    }
}
