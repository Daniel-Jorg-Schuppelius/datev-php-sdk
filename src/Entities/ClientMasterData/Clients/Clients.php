<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Clients.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Clients;

use Datev\Entities\Common\Clients\Clients as CommonClients;
use Psr\Log\LoggerInterface;

/**
 * @extends CommonClients<Client>
 */
class Clients extends CommonClients {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->valueClassName = Client::class;

        parent::__construct($data, $logger);
    }
}
