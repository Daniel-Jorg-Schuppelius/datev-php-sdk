<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EstablishmentID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Establishments\ID;

use Datev\Entities\ClientMasterData\Establishments\EstablishmentID as BaseEstablishmentID;
use Psr\Log\LoggerInterface;

class EstablishmentID extends BaseEstablishmentID {
    /**
     * @param mixed $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'establishment_id';
    }
}
