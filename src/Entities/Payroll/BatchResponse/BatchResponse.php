<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BatchResponse.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Payroll\BatchResponse;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Payroll\BatchResponse\Failed\FailedResponses;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponses;
use Psr\Log\LoggerInterface;

class BatchResponse extends NamedEntity {
    protected ?SucceededResponses $succeeded;
    protected ?FailedResponses $failed;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
