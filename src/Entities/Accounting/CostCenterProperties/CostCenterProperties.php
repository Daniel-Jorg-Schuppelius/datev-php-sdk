<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterProperties.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostCenterProperties;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Datev\Entities\Accounting\AccountPostings\AccountPosting;
use Psr\Log\LoggerInterface;

class CostCenterProperties extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = CostCenterProperty::class;

        parent::__construct($data, $logger);
    }
}
