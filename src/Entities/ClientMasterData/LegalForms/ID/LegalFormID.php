<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms\ID;

use DateTime;
use Datev\Entities\ClientMasterData\LegalForms\LegalFormID as BaseLegalFormID;
use Psr\Log\LoggerInterface;

class LegalFormID extends BaseLegalFormID {
    protected ?DateTime $valid_from;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'current_legal_form_id';
    }
}
