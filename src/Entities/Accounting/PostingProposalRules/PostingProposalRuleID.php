<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRuleID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\PostingProposalRules;

use APIToolkit\Entities\ID;
use Psr\Log\LoggerInterface;

class PostingProposalRuleID extends ID {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = 'id';
        parent::__construct($data, $logger);
    }
}
