<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Client.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Clients;

use Datev\Entities\Accounting\CompanyData;
use Datev\Entities\Common\Clients\Client as CommonClient;
use Psr\Log\LoggerInterface;

class Client extends CommonClient {
    protected CompanyData $company_data;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
