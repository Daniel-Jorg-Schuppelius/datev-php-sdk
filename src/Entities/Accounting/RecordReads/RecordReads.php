<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RecordReads.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\RecordReads;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Datev\Entities\Accounting\AccountPostings\AccountPosting;
use Psr\Log\LoggerInterface;

class RecordReads extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = RecordRead::class;

        parent::__construct($data, $logger);
    }
}
